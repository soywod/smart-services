$(document).ready(function () {
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
        scrollingSpeed: 400,
        easingcss3    : "cubic-bezier(0.86, 0, 0.07, 1)"
    });
});
