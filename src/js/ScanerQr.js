/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {


    var pcv = $('#qr-canvas').position();
    pcv.top += 20;
    pcv.left += 20;
    var plus = "+=";

    var laser = function () {
        $('#laser').animate(
        {
            top: [plus + Number(pcv.top + 200), "swing"]
        }, {
            duration: 1500,
            step: function (now, fx) {

                if (plus === "+=" && now >= pcv.top + 200) {
                    $('#laser').stop();
                    plus = "-=";
                    laser();
                } else if (plus === "-=" && now <= pcv.top) {
                    $('#laser').stop();
                    plus = "+=";
                    laser();
                }
            },
            complete: function () {
                // laser();
            }
        });
    };

    var decoder = $('#qr-canvas'),
            sl = $('.scanner-laser'), si = $('#scanned-img'), sQ = $('#scanned-QR');
    sl.css('opacity', .5);
    $('#cameraPlay').click(function () {
        if (typeof MediaStreamTrack.getSources !== 'undefined') {
            decoder.WebCodeCam({
                beep: "WebCodeCam-master/js/beep.mp3",
                ReadQRCode: true, // false or true
                ReadBarcode: false, // false or true
                videoSource: {
                    id: $('select#cameraId').val(),
                    maxWidth: 640,
                    maxHeight: 480
                },
                autoBrightnessValue: 70,
                contrast: 8,
                threshold: 5,
                resultFunction: function (text, imgSrc) {
                    si.attr('src', imgSrc);


                    sl.fadeOut(150, function () {
                        sl.fadeIn(150);
                    });
                    $.ajax("estudiante/IsEstudianteExist",
                    {
                        data: {id: text},
                        // especifica si será una petición POST o GET
                        type: 'POST',
                        // el tipo de información que se espera de respuesta
                        dataType: 'json',
                        success: function (json) {
                            // console.log(json);
                            // return;
                            $('#cargando').fadeOut();
                            if (!json.error) {
                                // alert("Carnet Compovado");
                                $('#estu').html(json.html);
                                window.location.href = window.location.pathname + '#estu';
                                //alert(json.mensaje);
                                // window.location.href = json.location;
                            } else {
                                alert(json.error);
                                $('#estu').html("");
                            }

                        },
                        error: function (jqXHR, status, error) {
                            console.log(error);

                        }
                    });
                },
                getUserMediaError: function () {
                    alert('Sorry, the browser you are using doesn\'t support getUserMedia');
                },
                cameraError: function (error) {
                    var p, message = 'Error detected with the following parameters:\n';
                    for (p in error)
                    {
                        message += p + ': ' + error[p] + '\n';
                    }
                    alert(message);
                }
            });
            sQ.text('Scanning ...');


        } else {
            alert("no hay camara ");
            document.querySelector('select#cameraId').remove();
        }
        $('#laser').css({'display': 'block', 'top': pcv.top, 'left': pcv.left});
        $('#laser').addClass('laser-animation');
        // laser();//laser-animation
    });




    changeZoom = function (a) {
        if (typeof decoder.data().plugin_WebCodeCam == "undefined")
            return;
        var value = typeof a != 'undefined' ? parseFloat(a.toPrecision(2)) : 1.2 / 10;
        // zov.text(zov.text().split(':')[0] + ': ' + value.toString());
        decoder.data().plugin_WebCodeCam.options.zoom = parseFloat(value);

    };

    var getZomm = setInterval(function () {
        var a;
        try {
            a = decoder.data().plugin_WebCodeCam.optimalZoom();
        } catch (e) {
            a = 0;
        }
        if (a != 0) {
            changeZoom(a);
            clearInterval(getZomm);
        }
    }, 500);
    function gotSources(sourceInfos) {
        for (var i = 0; i !== sourceInfos.length; ++i)
        {
            var sourceInfo = sourceInfos[i];
            var option = document.createElement('option');
            option.value = sourceInfo.id;
            if (sourceInfo.kind === 'video') {
                var face = sourceInfo.facing == '' ? 'unknown' : sourceInfo.facing;
                option.text = sourceInfo.label || 'camera ' + (videoSelect.length + 1) + ' (facing: ' + face + ')';
                videoSelect.appendChild(option);
            }

        }

    }
    var videoSelect = document.querySelector('select#cameraId');
    $(videoSelect).change(function (event) {
        decoder.data().plugin_WebCodeCam.delay();
        if (typeof decoder.data().plugin_WebCodeCam !== "undefined") {
            try {
                decoder.data().plugin_WebCodeCam.cameraStopAll();
            } catch (Exceptio) {
                decoder.data().plugin_WebCodeCam.cameraStop();
            }

            decoder.data().plugin_WebCodeCam.options.videoSource.id = $(this).val();

            decoder.data().plugin_WebCodeCam.cameraPlay(false);
        }
    });
    MediaStreamTrack.getSources(gotSources);

});
