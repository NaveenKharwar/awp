module.exports = function (grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON("package.json"),
    sass: {
      dist: {
        options: {
          style: "expanded",
        },
        files: {
          "assets/css/theme.css": "resources/sass/theme.scss",
          "style.css": "resources/sass/style.scss",
          "assets/css/style-editor.css":
            "resources/sass/editor/style-editor.scss",
        },
      },
    },
    cssmin: {
      build: {
        expand: true,
        src: ["assets/css/theme.css"],
        ext: ".min.css",
      },
    },
    uglify: {
      my_target: {
        files: {
          "assets/js/bootstrap.min.js": [
            "node_modules/bootstrap/dist/js/bootstrap.js",
          ],
        },
      },
    },
    copy: {
      build: {
        src: [
          "**",
          "!node_modules/**",
          "!vendor/**",
          "!Gruntfile.js",
          "!package.json",
          "!package-lock.json",
          "!resources/**",
          "!composer.json",
          "!composer.lock",
          "!phpcs.xml.dist",
          "!README.md",
          "!CHANGELOG.md",
          "!style.css.map",
          "!assets/css/**.css.map",
          "!wpcs",
          // "!theme.css.map",
          // "!style-editor.css.map",
          "!woocommerce.css.map",
        ],
        dest: "build/",
      },
    },
    compress: {
      build: {
        options: {
          archive: "<%= pkg.name %> - <%= pkg.version %> on <%= grunt.template.today('yyyy-mm-dd HH:mm:ss') %> .zip",
        },
        files: [
          {
            expand: true,
            cwd: "build/",
            src: ["**/*"],
          },
        ],
      },
    },
    clean: {
      dist: {
        src: ["build"],
      },
    },
    version: {
      stylesheet: {
        options: {
          prefix: "Version\\:\\s+",
        },
        src: "style.css",
      },
      functions: {
        options: {
          prefix: "AGILITYWP_VERSION', '",
        },
        src: "functions.php",
      },
    },
    watch: {
      css: {
        files: "**/*.scss",
        tasks: ["sass", "cssmin", "uglify", "version"],
        options: {
          spawn: false
        }
      },
    },
  });
  grunt.loadNpmTasks("grunt-contrib-sass");
  grunt.loadNpmTasks("grunt-contrib-watch");
  grunt.loadNpmTasks("grunt-contrib-cssmin");
  grunt.loadNpmTasks("grunt-contrib-copy");
  grunt.loadNpmTasks("grunt-contrib-compress");
  grunt.loadNpmTasks("grunt-contrib-clean");
  grunt.loadNpmTasks("grunt-contrib-uglify");
  grunt.loadNpmTasks("grunt-version");
  // Watch Task
  grunt.registerTask("default", ["watch"]);
  // build task
  grunt.registerTask("build", ["sass", "cssmin", "uglify", "version"]);
  // Release Task
  grunt.registerTask("prod", ["sass", "cssmin", "uglify", "version", "copy", "compress", "clean"]);
};
