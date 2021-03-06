var gulp   = require("gulp"),
    sass   = require("gulp-sass"),
    minify = require("gulp-cssnano"),
    concat = require("gulp-concat"),
    uglify = require("gulp-uglify");

var paths = {
    css: [
        "bower_components/html5-boilerplate/dist/css/normalize.css",
        "bower_components/html5-boilerplate/dist/css/main.css",
        "bower_components/fullpage.js/dist/jquery.fullpage.min.css"
    ],
    js : {
        head: [
            "bower_components/html5-boilerplate/dist/js/vendor/modernizr*.js"
        ],
        body: [
            "bower_components/jquery/dist/jquery.min.js",
            "bower_components/fullpage.js/dist/jquery.fullpage.min.js"
        ]
    }
};

// ==================== JS tasks ==================== //

gulp.task("js-local", function () {
    return gulp.src("src/js/**/*.js")
        .pipe(concat("local.min.js"))
        .pipe(gulp.dest("dist/js"));
});

gulp.task("js-vendors-head", function () {
    return gulp.src(paths.js.head)
        .pipe(concat("vendors-head.min.js"))
        .pipe(gulp.dest("dist/js"));
});

gulp.task("js-vendors-body", function () {
    return gulp.src(paths.js.body)
        .pipe(concat("vendors-body.min.js"))
        .pipe(gulp.dest("dist/js"));
});

gulp.task("js-local-min", function () {
    return gulp.src("src/js/**/*.js")
        .pipe(uglify())
        .pipe(concat("local.min.js"))
        .pipe(gulp.dest("dist/js"));
});

gulp.task("js-vendors-head-min", function () {
    return gulp.src(paths.js.head)
        .pipe(uglify())
        .pipe(concat("vendors-head.min.js"))
        .pipe(gulp.dest("dist/js"));
});

gulp.task("js-vendors-body-min", function () {
    return gulp.src(paths.js.body)
        .pipe(uglify())
        .pipe(concat("vendors-body.min.js"))
        .pipe(gulp.dest("dist/js"));
});

gulp.task("js", ["js-local", "js-vendors-head", "js-vendors-body"]);
gulp.task("js-min", ["js-local-min", "js-vendors-head-min", "js-vendors-body-min"]);

// ==================== CSS tasks ==================== //

gulp.task("css-desktop", function () {
    return gulp.src("src/sass/desktop.sass")
        .pipe(sass())
        .pipe(concat("desktop.min.css"))
        .pipe(gulp.dest("dist/css"));
});

gulp.task("css-tablet", function () {
    return gulp.src("src/sass/tablet.sass")
        .pipe(sass())
        .pipe(concat("tablet.min.css"))
        .pipe(gulp.dest("dist/css"));
});

gulp.task("css-mobile", function () {
    return gulp.src("src/sass/mobile.sass")
        .pipe(sass())
        .pipe(concat("mobile.min.css"))
        .pipe(gulp.dest("dist/css"));
});

gulp.task("css-vendors", function () {
    return gulp.src(paths.css)
        .pipe(concat("vendors.min.css"))
        .pipe(gulp.dest("dist/css"));
});

gulp.task("css-desktop-min", function () {
    return gulp.src("src/sass/desktop.sass")
        .pipe(sass())
        .pipe(minify())
        .pipe(concat("desktop.min.css"))
        .pipe(gulp.dest("dist/css"));
});

gulp.task("css-tablet-min", function () {
    return gulp.src("src/sass/tablet.sass")
        .pipe(sass())
        .pipe(minify())
        .pipe(concat("tablet.min.css"))
        .pipe(gulp.dest("dist/css"));
});

gulp.task("css-mobile-min", function () {
    return gulp.src("src/sass/mobile.sass")
        .pipe(sass())
        .pipe(minify())
        .pipe(concat("mobile.min.css"))
        .pipe(gulp.dest("dist/css"));
});

gulp.task("css-vendors-min", function () {
    return gulp.src(paths.css)
        .pipe(minify())
        .pipe(concat("vendors.min.css"))
        .pipe(gulp.dest("dist/css"));
});

gulp.task("css", ["css-desktop", "css-tablet", "css-mobile", "css-vendors"]);
gulp.task("css-min", ["css-desktop-min", "css-tablet-min", "css-mobile-min", "css-vendors-min"]);

// ==================== Global tasks ==================== //

gulp.task("watch", function () {
    gulp.watch("src/js/**/*.js", ["js-local"]);
    gulp.watch("src/sass/**/*.sass", ["css-desktop", "css-tablet", "css-mobile"]);
});

gulp.task("default", ["css", "js"]);
gulp.task("prod", ["css-min", "js-min"]);
