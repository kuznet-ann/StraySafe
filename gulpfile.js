const gulp        = require('gulp');
const browserSync = require('browser-sync');
const sass        = require('gulp-sass');
const cleanCSS = require('gulp-clean-css');
const autoprefixer = require('gulp-autoprefixer');
const rename = require("gulp-rename");
const imagemin = require('gulp-imagemin');
const htmlmin = require('gulp-htmlmin');

gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "stray-safe/dist",
        notify: false
    });

    
    gulp.watch("src/*.+(html|php)").on('change', browserSync.reload);
    gulp.watch("src/**/*.+(html|php)").on('change', browserSync.reload);
});

gulp.task('styles', function() {
    return gulp.src("src/sass/**/*.+(scss|sass)")
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(rename({suffix: '.min', prefix: ''}))
        .pipe(autoprefixer())
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(gulp.dest("dist/css"))
        .pipe(browserSync.stream());
});

gulp.task('watch', function() {
    gulp.watch("src/sass/**/*.+(scss|sass|css)", gulp.parallel('styles'));
    gulp.watch("src/*.+(html|php)").on('change', gulp.parallel('html'));
    gulp.watch("src/pages/*.+(html|php)").on('change', gulp.parallel('htmlpages'));
    gulp.watch("src/models/*.+(html|php)").on('change', gulp.parallel('htmlmodels'));
    gulp.watch("src/config/*.+(html|php)").on('change', gulp.parallel('htmlconfig'));
    gulp.watch("src/js/**/*.js").on('change', gulp.parallel('scripts'));
    gulp.watch("src/img/**/*").on('all', gulp.parallel('images'));

});

gulp.task('html', function () {
    return gulp.src("src/*.+(html|php)")
        .pipe(htmlmin({ collapseWhitespace: true }))
        .pipe(gulp.dest("dist/"));
});

gulp.task('htmlpages', function () {
    return gulp.src("src/pages/*.+(html|php)")
        .pipe(htmlmin({ collapseWhitespace: true }))
        .pipe(gulp.dest("dist/pages"));
});

gulp.task('htmlmodels', function () {
    return gulp.src("src/models/*.+(html|php)")
        .pipe(htmlmin({ collapseWhitespace: true }))
        .pipe(gulp.dest("dist/models"));
});

gulp.task('htmlconfig', function () {
    return gulp.src("src/config/*.+(html|php)")
        .pipe(htmlmin({ collapseWhitespace: true }))
        .pipe(gulp.dest("dist/config"));
});

gulp.task('scripts', function () {
    return gulp.src("src/js/**/*.js")
        .pipe(gulp.dest("dist/js"))
        .pipe(browserSync.stream());
});

gulp.task('images', function () {
    return gulp.src("src/images/**/*")
        .pipe(imagemin())
        .pipe(gulp.dest("dist/images"))
        .pipe(browserSync.stream());
});

gulp.task('default', gulp.parallel('watch', 'browser-sync', 'scripts', 'html', 'htmlpages', 'htmlmodels','htmlconfig', 'styles', 'images'));