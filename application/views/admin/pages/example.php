<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hopscotch/0.2.5/css/hopscotch.min.css">
    <link href="<?= base_url(); ?>dist/css/style.min.css" rel="stylesheet">

</head>
<style>
    p {
        margin: 0;
    }

    .clear {
        clear: both;
    }

    .contentBox {
        width: 600px;
        height: auto;
        margin: 0 40px;
    }

    #menu li {
        float: left;
        list-style: none;
    }

    #menu li a {
        display: block;
        padding: 20px 50px;
        background: #CCC;
        text-decoration: none;
        text-transform: uppercase;
        color: #FFF;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, .8);
        z-index: 5;
    }

    .overlay-relative {
        position: relative;
        z-index: 7;
    }

    .helper {
        position: absolute;
        top: 0;
        left: 0;
        padding: 5px;
        background: #FFF;
        border-radius: 4px;
        z-index: 6;
    }
</style>

<body>
    <ul id="menu">
        <li id="step1"><a href="#">Home</a></li>
        <li id="step2"><a href="#">About</a></li>
        <li id="step3"><a href="#">Portfolio</a></li>
        <li id="step4"><a href="#">Contact</a></li>
        <div class="clear"></div>
    </ul>

    <div class="contentBox">
        <p id="step5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis id arcu risus. Quisque fringilla consectetur arcu, quis pulvinar lorem porttitor id. Praesent porttitor id eros vitae aliquet. Donec porttitor enim sed rhoncus mollis. Maecenas vulputate dictum nisi non sagittis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vulputate vehicula eros sed vulputate. Aliquam nisi urna, tristique eget lorem vitae, ullamcorper dapibus elit. Pellentesque vestibulum quam vel arcu rhoncus, quis tristique tellus interdum. Vivamus pharetra mauris sit amet magna dignissim, convallis rutrum arcu pharetra. Maecenas laoreet interdum maximus. Cras fringilla suscipit condimentum. Phasellus placerat fermentum luctus. Integer congue tempus magna non gravida. Pellentesque malesuada nunc porta dolor sollicitudin, non varius nunc sollicitudin. Phasellus commodo nec lectus volutpat facilisis.

            In convallis urna erat, ornare posuere neque posuere vitae. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec fringilla malesuada nunc a ultricies. Aenean posuere nec libero eu fringilla. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce malesuada justo porttitor varius viverra. Sed augue nisi, bibendum at faucibus et, vulputate non sapien. Nullam a ante a lectus fringilla maximus. Nunc eget ultricies nisi. Aliquam magna est, posuere ac venenatis nec, pulvinar nec orci. Praesent consequat volutpat elementum.</p>
    </div>
<script src="<?= base_url(); ?>assets/node_modules/jquery/dist/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/hopscotch/0.2.5/js/hopscotch.min.js"></script>
    <script>
        hopscotch.registerHelper('addOverlay', function() {
            $('body').append('<div class="overlay"></div>');
        });

        hopscotch.registerHelper('removeOverlay', function() {
            $('.overlay').fadeOut(function() {
                $(this).remove();
                $('.helper').remove();
            });
        });

        hopscotch.listen('show', function() {
            var elementObject = $(hopscotch.getCurrTarget(tour));
            var element = $('#' + elementObject[0].id);

            element.prev().removeClass('overlay-relative');
            element.addClass('overlay-relative');

            if ($('.helper').length !== 0) {

                // Use Helper Layer for hilight target element.
                var helper = $('.helper');
                var padding = 5;
                var helperPosX = element.position().left - padding;
                var helperPosY = element.position().top - padding;
                var targetWidth = element.outerWidth();
                var targetHeight = element.outerHeight();

                console.log('PositionX : ' + helperPosX + ' PositionY : ' + helperPosY);
                console.log('TargetWidth : ' + targetWidth + ' TargetHeight : ' + targetHeight);

                helper.css('width', targetWidth);
                helper.css('height', targetHeight);
                helper.offset({
                    left: helperPosX,
                    top: helperPosY
                });

            } else {

                // Add Helper Layer for highlight target element.
                var newHelper = '<div class="helper"></div>';
                $('body').append(newHelper);

                var helper = $('.helper');
                var padding = 5;
                var helperPosX = element.position().left - padding;
                var helperPosY = element.position().top - padding;
                var targetWidth = element.outerWidth();
                var targetHeight = element.outerHeight();

                console.log('PositionX : ' + helperPosX + ' PositionY : ' + helperPosY);
                console.log('TargetWidth : ' + targetWidth + ' TargetHeight : ' + targetHeight);

                helper.css('width', targetWidth);
                helper.css('height', targetHeight);
                helper.offset({
                    left: helperPosX,
                    top: helperPosY
                });
            }

        });

        var tour = {
            id: "hello-hopscotch",
            steps: [{
                    title: "My Header",
                    content: "This is the header of my page.",
                    target: "step1",
                    placement: "bottom",
                    zindex: 999999,
                    yOffset: 10,
                    onNext: function() {
                        $('#step1').removeClass('overlay-relative');
                        $('.helper').remove();
                    }
                },
                {
                    title: "My Header",
                    content: "This is the header of my page.",
                    target: "step2",
                    placement: "bottom",
                    zindex: 999999,
                    yOffset: 10,
                    onNext: function() {
                        $('#step2').removeClass('overlay-relative');
                        $('.helper').remove();
                    }
                },
                {
                    title: "My Header",
                    content: "This is the header of my page.",
                    target: "step3",
                    placement: "bottom",
                    zindex: 999999,
                    yOffset: 10,
                    onNext: function() {
                        $('#step3').removeClass('overlay-relative');
                        $('.helper').remove();
                    }
                },
                {
                    title: "My Header",
                    content: "This is the header of my page.",
                    target: "step4",
                    placement: "bottom",
                    zindex: 999999,
                    yOffset: 10,
                    onNext: function() {
                        $('#step4').removeClass('overlay-relative');
                        $('.helper').remove();
                    }
                },
                {
                    title: "My Header",
                    content: "This is the header of my page.",
                    target: "step5",
                    placement: "right",
                    zindex: 999999,
                    xOffset: 10,
                    onNext: function() {
                        $('#step5').removeClass('overlay-relative');
                        $('.helper').remove();
                    }
                },
            ],
            onStart: ["addOverlay"],
            onEnd: ["removeOverlay"],
        };

        hopscotch.startTour(tour);
    </script>
</body>

</html>