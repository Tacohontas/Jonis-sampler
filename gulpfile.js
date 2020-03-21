var gulp = require("gulp");
var autoprefix = require("gulp-autoprefixer");
var plumber = require("gulp-plumber");
var sass = require("gulp-sass");
const concat = require("gulp-concat");
let cleanCSS = require("gulp-clean-css");
sass.compiler = require("node-sass");

const SCSS_PATH = "Frontend/style/**/*.scss";
const JS_PATH = "Frontend/js/*.js";

//styles

gulp.task("styles", async function() {
  console.log("styles is running");
  //return gulp.src(["public/scss/reset/reset.scss", CSS_PATH])
  return (
    gulp
      .src(SCSS_PATH)
      .pipe(
        plumber(function(err) {
          console.log("Styles error", err);
        })
      )
      // .pipe(sourcemaps.init())
      .pipe(sass().on("error", sass.logError))
      .pipe(concat("style.css")) // kommer ta dina css-filer och baka ihop till en cssfil med namnet "styles.css"
      .pipe(cleanCSS({ compatibility: "ie8" })) // lägger all CSS på samma rad.
      //  .pipe(sourcemaps.write("./maps"))
      .pipe(autoprefix()) // gör din kod kompatibel med andra browsers.

      .pipe(gulp.dest("Frontend/style"))
  ); // Här väljer man destinationen för style.css-filen
});

gulp.task("scripts", async function() {
  console.log("scripts is running");

  return (
    gulp
      .src(JS_PATH)

      // .pipe(uglify())
      // .on('error', function (err) { console.log(err) })
      .pipe(concat("app.js"))

      .pipe(gulp.dest("Frontend/js/dist"))
  );
});

//gulp watch

gulp.task("watch", function(done) {
  gulp.watch(SCSS_PATH, gulp.series("styles"))
  gulp.watch(JS_PATH, gulp.series("scripts"))
  done();
});
