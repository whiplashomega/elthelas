var gulp = require('gulp'),
    minifycss = require('gulp-minify-css'),
    jshint = require('gulp-jshint'),
    stylish = require('jshint-stylish'),
    uglify = require('gulp-uglify'),
    usemin = require('gulp-usemin'),
    imagemin = require('gulp-imagemin'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    //notify = require('gulp-notify'),
    cache = require('gulp-cache'),
    changed = require('gulp-changed'),
    rev = require('gulp-rev'),
    browserSync = require('browser-sync'),
    del = require('del'),
    ngannotate = require('gulp-ng-annotate'),
    sass = require('gulp-sass'),
    fs = require('fs');

//precompile
gulp.task('jshint', function() {
    return gulp.src('src/AppBundle/js/**/*.js')
    .pipe(jshint())
    .pipe(jshint.reporter(stylish));
});

gulp.task('copylibraries', function() {
   gulp.src('./bower_components/angular/angular.js').pipe(gulp.dest("./dev/libraries"));
   gulp.src('./bower_components/angular-marked/angular-marked.js').pipe(gulp.dest("./dev/libraries"));
   gulp.src('./bower_components/angular-marked/dist/angular-marked.js').pipe(gulp.dest("./dev/libraries"));
   gulp.src('./bower_components/bootstrap/dist/js/bootstrap.js').pipe(gulp.dest("./dev/libraries"));
   gulp.src('./bower_components/bootstrap/dist/css/*.min.css').pipe(gulp.dest("./dev/css"));
   gulp.src('./bower_components/bootstrap/dist/fonts/*').pipe(gulp.dest("./dev/fonts"));
   gulp.src('./bower_components/datatables/media/js/jquery-dataTables.js').pipe(gulp.dest("./dev/libraries"));
   gulp.src('./bower_components/datatables/media/css/dataTables.bootstrap.css').pipe(gulp.dest("./dev/css"));
   gulp.src('./bower_components/datatables/media/css/jquery.dataTables.css').pipe(gulp.dest("./dev/css"));
   gulp.src('./bower_components/datatables/media/images/*').pipe(gulp.dest("./dev/images"));
   gulp.src('./bower_components/droll/droll.js').pipe(gulp.dest("./dev/libraries"));
   gulp.src('./bower_components/jquery/dist/jquery.js').pipe(gulp.dest("./dev/libraries"));
   gulp.src('./bower_components/leaflet/dist/leaflet.js').pipe(gulp.dest("./dev/libraries"));
   gulp.src('./bower_components/leaflet/dist/leaflet.css').pipe(gulp.dest("./dev/css"));
   gulp.src('./bower_components/leaflet/dist/images/*').pipe(gulp.dest("./dev/images"));
   gulp.src('./bower_components/marked/lib/marked.js').pipe(gulp.dest("./dev/libraries"));
   gulp.src('./bower_components/angular-ui-router/release/angular-ui-router.js').pipe(gulp.dest("./dev/libraries"));
   return true;
});

//compile
gulp.task('sass', function() {
    return gulp.src('./dev/sass/**/*.scss').pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./dev/css'));
});

gulp.task('sass:watch', function() {
   gulp.watch('./dev/sass/**/*.scss',['sass']); 
});

gulp.task('usemin',['jshint', 'sass', 'copylibraries'], function () {
  return gulp.src('./dev/**/*.html')
      .pipe(usemin({
        css:[minifycss(),rev()],
        js: [ngannotate(),uglify(),rev()]
      }))
      .pipe(gulp.dest('./web/'));
});

gulp.task('spellsjson', function() {
  function intersect(arrays) {
    return arrays.shift().filter(function(v) {
        return arrays.every(function(a) {
            return a.indexOf(v) !== -1;
        });
    });
  }
  fs.readdir("./dev/spells", (err, files) => {
    var spellarray = [];
    console.log(err);
    files.forEach(file => {
        fs.readFile("./dev/spells/" + file, "utf-8", (err, data) => {
          if(err) {
              console.log(err);
          } else {
            var spell = {};
            var filearray = data.split('\n');
            
            spell.title = filearray[2].replace(/\"/g,"").replace(/title\:[ \t]+/g, "");
            spell.source = filearray[4].replace(/source\:[ \t]+/g, "");
            spell.tags = filearray[5].replace(/tags:[ \t]+\[/g, "").replace(/\]/, "").split(", ");
            var schoolarrays = [ spell.tags, ["abjuration", "conjuration", "divination", "enchantment", "evocation", "illusion", "necromancy", "transmutation"]];
            spell.school = intersect(schoolarrays)[0];
            var levelarrays = [ spell.tags, ["cantrip", "level1", "level2", "level3", "level4", "level5", "level6", "level7", "level8", "level9"]];
            spell.level = intersect(levelarrays)[0];
            spell.ritual = false;
            if(intersect([spell.tags, ["ritual"]]).length > 0) {
                spell.ritual = true;
            }
            spell.castingTime = filearray[10].replace(/\*\*Casting Time\*\*\:[ \t]+/g,"");
            spell.range = filearray[12].replace(/\*\*Range\*\*\:[ \t]+/g, "");
            spell.components = filearray[14].replace(/\*\*Components\*\*\:[ \t]+/g, "");
            spell.duration = filearray[16].replace(/\*\*Duration\*\*\:[ \t]+/g, "");
            spell.description = "<p>" + filearray.slice(18, filearray.length-1).join("</p><p>").replace(/\*\*At Higher Levels.\*\*/g, "<strong>At Higher Levels.</strong>") + "</p>";
            spellarray.push(spell);
          }
          if(spellarray.length === files.length) {
            console.log("writing spells.json");
            //console.log(spellarray);
            fs.writeFile("./dev/json/spells.json", JSON.stringify(spellarray), "utf-8");
          }
      });
    });
  });
  return true;
});

gulp.task('cleanup', [], function() {
   return del(['web/images']); 
});

gulp.task('copyimages', ['cleanup'], function() {
   return gulp.src('dev/images/**/*').pipe(gulp.dest('web/images'));
});

gulp.task('copyjson', ['spellsjson'], function() {
    return gulp.src('./dev/json/**/*.json').pipe(gulp.dest('./web/json'));
});
//post-compile
gulp.task('default', ['copylibraries', 'jshint', 'spellsjson'], function() {});

gulp.task('prod', ['copyimages', 'usemin', 'copyjson'], function() {});

//continuous integration
gulp.task('watch', ['sass:watch'], function() {
    
});