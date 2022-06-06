var gulp = require('gulp');
var gulpless = require('gulp-less');

const paths = {
    style_src: 'resources/less/style.less',
    style_dest: 'public/css/'
};

function styles() {
    return gulp.src(paths.style_src)
      .pipe(gulpless())
      .pipe(gulp.dest(paths.style_dest));
  }

exports.styles = styles;