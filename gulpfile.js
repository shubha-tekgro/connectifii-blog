const gulp = require("gulp");
const browserSync = require("browser-sync").create();

// Paths
const phpWatchFiles = ["./**/*.php"];
const cssWatchFiles = ["./**/*.css", "./**/*.js"];

// BrowserSync init
function serve() {
  browserSync.init({
    proxy: "http://localhost/connectify", // change to match your local WP URL
    notify: false,
    open: false,
  });

  gulp.watch(phpWatchFiles).on("change", browserSync.reload);
  gulp.watch(cssWatchFiles).on("change", browserSync.reload);
}

exports.default = serve;
