module.exports = function (grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON("package.json"),
    sass: {
      dist: {
        options: {
          style: "expanded",
        },
        files: {
          "style.css": "resources/sass/style.scss",
          "assets/css/theme.css": "resources/sass/theme.scss",
          "assets/css/style-editor.css":
            "resources/sass/editor/style-editor.scss",
        },
      },
    },
    cssmin: {
      target: {
        src: ["assets/css/theme.css"],
        dest: "assets/css/theme.min.css",
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
          "!style.css.map",
          "!woocommerce.css.map",
        ],
        dest: "build/",
      },
    },
    compress: {
      build: {
        options: {
          archive: "agilitywp.zip",
        },
        files: [
          {
            expand: true,
            cwd: "build/",
            src: ["**/*"],
            dist: "/",
          },
        ],
      },
    },
    clean: {
      dist: {
        src: ["build", "agilitywp.zip"],
      },
    },
    watch: {
      css: {
        files: "**/*.scss",
        tasks: ["sass", "cssmin"],
      },
    },
    version: {
      stylesheet: {
        options: {
          prefix: 'Version\\:\\s+'
        },
        src: 'style.css'
      },
      scssStylesheet: {
        options: {
          prefix: 'Version\\:\\s+'
        },
        src: 'resources/sass/style.scss'
      },
      functions: {
        options: {
          prefix: 'AGILITYWP_VERSION\', \''
        },
        src: 'functions.php'
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
  grunt.loadNpmTasks('grunt-version');
  // Watch Task
  grunt.registerTask("default", ["watch"]);
  // Release Task
  grunt.registerTask("build", ["copy", "compress"]);
};
