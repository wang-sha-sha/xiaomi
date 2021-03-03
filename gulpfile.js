const gulp = require("gulp");
const gulp_babel = require('gulp-babel');

//banner_jQ.js
gulp.task("_babel",function(){
	gulp.src("js/indexES6.js").pipe(gulp_babel({presets: ['es2015']})).pipe(gulp.dest("js"));
});


