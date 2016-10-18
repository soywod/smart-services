$(document).ready(function () {
    var $footer     = $("footer");
    var $menuBurger = $(".menu-burger");
    var $menuRight  = $(".menu-right");

    $("#fullpage").fullpage({
        anchors       : [
            "optimisation-documents",
            "optimisation-durable",
            "audit-et-expertise",
            "gestion-projet",
            "integration-et-management",
            "papier-ou-numerique",
            "dematerialisation",
            "solutions-archivage",
            "contact"
        ],
        menu          : ".menu-right",
        css3          : true,
        scrollingSpeed: 400,
        autoScrolling : $(window).width() > 767,
        easingcss3    : "cubic-bezier(0.86, 0, 0.07, 1)",
        onLeave       : function (index, nextIndex, direction) {
            $footer.removeClass();

            if (direction === "down") {
                setTimeout(changeFooterClasses.bind(this, nextIndex), 400);
            }
            else {
                changeFooterClasses(nextIndex);
            }

            function changeFooterClasses(index) {
                switch (index) {
                    case 3:
                    case 5:
                    case 7:
                        $footer.removeClass().addClass("arrow white");
                        break;
                    case 4:
                    case 8:
                        $footer.removeClass().addClass("arrow grey");
                        break;
                    default:
                        $footer.removeClass();
                }
            }
        }
    });

    $menuBurger.click(function () {
        $menuRight.toggle();
    });

    $menuRight.on("click", "a", function () {
        $menuRight.toggle();
    });
});
