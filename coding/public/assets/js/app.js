// Template Name: Al-Buraq
// Template URL: https://techpedia.co.uk/template/al-buraq/
// Description: Mosque HTML5 Template
// Author: TPD-Themes
// Version: 1.0.0
(function (window, document, $, undefined) {
  "use strict";
  // ==========================================================
  // Detect mobile device and add class "is-mobile" to </body>
  // ==========================================================

  // Detect mobile device (Do not remove!!!)
  var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Nokia|Opera Mini/i.test(navigator.userAgent) ? true : false;

  // Add class "is-mobile" to </body>
  if (isMobile) {
    $("body").addClass("is-mobile");
  }

  var alburaqInit = {
    i: function (e) {
      alburaqInit.s();
      alburaqInit.methods();
    },
    s: function (e) {
      (this._window = $(window)),
        (this._document = $(document)),
        (this._body = $("body")),
        (this._html = $("html"));
    },
    methods: function (e) {
      alburaqInit.w();
      alburaqInit.contactForm();
      alburaqInit.smoothScroll();
      alburaqInit.BackToTop();
      alburaqInit.intializeSlick();
      // alburaqInit.modalVideo();
      alburaqInit.salActivation();
      alburaqInit.donationBar();
      alburaqInit.radialProgress();
      alburaqInit.hidepreloader();
      // alburaqInit.videplay();
      alburaqInit.countdownInit(".countdown", "2024/11/01");
    },
    w: function (e) {
      this._window.on("load", alburaqInit.l).on("scroll", alburaqInit.res);
    },
    hidepreloader: function () {
      $("#preloader").hide();
    },
    smoothScroll: function () {
      // =======================================================================================
      // Smooth Scrollbar
      // Source: https://github.com/idiotWu/smooth-scrollbar/
      // =======================================================================================

      if ($("body").hasClass("ui-smooth-scroll")) {

        // Not for mobile devices!
        if (!isMobile) {

          var Scrollbar = window.Scrollbar;

          // AnchorPlugin (URL with hash links load in the right position)
          // https://github.com/idiotWu/smooth-scrollbar/issues/440
          // ==================================
          class AnchorPlugin extends Scrollbar.ScrollbarPlugin {
            static pluginName = 'anchor';

            onHashChange = () => {
              this.jumpToHash(window.location.hash);
            };

            onClick = (event) => {
              const { target } = event;
              if (target.tagName !== 'A') {
                return;
              }
              const hash = target.getAttribute('href');
              if (!hash || hash.charAt(0) !== '#') {
                return;
              }
              this.jumpToHash(hash);
            };

            jumpToHash = (hash) => {
              if (!hash) {
                return;
              }
              const { scrollbar } = this;
              scrollbar.containerEl.scrollTop = 0;
              const target = document.querySelector(hash);
              if (target) {
                scrollbar.scrollIntoView(target, {
                  offsetTop: parseFloat(target.getAttribute('data-offset')) || 0 // Change to set default offset
                });
              }
            };

            onInit() {
              this.jumpToHash(window.location.hash);
              window.addEventListener('hashchange', this.onHashChange);
              this.scrollbar.contentEl.addEventListener('click', this.onClick);
            };

            onDestory() {
              window.removeEventListener('hashchange', this.onHashChange);
              this.scrollbar.contentEl.removeEventListener('click', this.onClick);
            };
          };

          // usage
          Scrollbar.use(AnchorPlugin);


          // Init Smooth Scrollbar
          // ======================
          Scrollbar.init(document.querySelector("#scroll-container"), {
            damping: 0.06,
            renderByPixel: true,
            continuousScrolling: true,
            alwaysShowTracks: true
          });


          // 3rd party library setup
          // More info: https://greensock.com/docs/v3/Plugins/ScrollTrigger/static.scrollerProxy()
          // ========================
          let scrollPositionX = 0,
            scrollPositionY = 0,
            bodyScrollBar = Scrollbar.init(document.getElementById("scroll-container"));

          bodyScrollBar.addListener(({ offset }) => {
            scrollPositionX = offset.x;
            scrollPositionY = offset.y;
          });

          bodyScrollBar.setPosition(0, 0);
          bodyScrollBar.track.xAxis.element.remove();

          // Enable regular scrollbar inside a smooth scrollbar (#scroll-container). IMPORTANT: use class "tt-overflow" on inside scroll elements!
          // ===================================================
          if ($(".tt-overflow").length) {
            // Determine if an element is scrollable
            $.fn.ttIsScrollable = function () {
              return this[0].scrollWidth > this[0].clientWidth || this[0].scrollHeight > this[0].clientHeight;
            };

            $(".tt-overflow").each(function () {
              var $this = $(this);
              if ($this.ttIsScrollable()) {
                $this.on("wheel", function (e) {
                  e.stopPropagation();
                });
              }
            });
          }


          // Prevent input[type=number] to scroll on focus 
          // ==============================================
          $("input[type=number]").on("focus", function () {
            $(this).on("wheel", function (e) {
              e.stopPropagation();
            });
          });

        }

      }
    },
    radialProgress: function () {
      $("svg.radial-progress").each(function (index, value) {
        $(this).find($("circle.complete")).removeAttr("style");
      });
      $(window)
        .scroll(function () {
          $("svg.radial-progress").each(function (index, value) {
            var percent = $(value).data("percentage");
            var radius = $(this).find($("circle.complete")).attr("r");
            var circumference = 2 * Math.PI * radius;
            var strokeDashOffset =
              circumference - (percent * circumference) / 100;
            $(this)
              .find($("circle.complete"))
              .animate({ "stroke-dashoffset": strokeDashOffset }, 1250);
          });
        })
        .trigger("scroll");
    },
    donationBar: function () {
      const progress = $(".progress-done");
      if (progress.length) {
        progress.css("width", progress.attr("data-done") + "%");
        progress.css("opacity", 1);
      }
    },
    contactForm: function () {
      $(".al-buraq-contact-form").on("submit", function (e) {
        e.preventDefault();
        var _self = $(this);
        var _selector = _self.closest("input,textarea");
        _self.closest("div").find("input,textarea").removeAttr("style");
        _self.find(".error-msg").remove();
        _self
          .closest("div")
          .find('button[type="submit"]')
          .attr("disabled", "disabled");
        var data = $(this).serialize();
        $.ajax({
          url: "./assets/mail/contact.php",
          type: "post",
          dataType: "json",
          data: data,
          success: function (data) {
            _self.find('button[type="submit"]').removeAttr("disabled");
            if (data.success) {
              _self.find(".message").html("Email Sent Successfully");
            } else {
              _self.find(".message").html("There is an error");
            }
            _self.trigger("reset");
            _self.find(".message").slideDown("slow");
            setTimeout(function () {
              _self.find(".message").slideUp("hide");
            }, 3000);
          },
        });
      });
    },

    BackToTop: function () {
      var btn = $("#backto-top");
      $(window).on("scroll", function () {
        if ($(window).scrollTop() > 300) {
          btn.addClass("show");
        } else {
          btn.removeClass("show");
        }
      });
      btn.on("click", function (e) {
        e.preventDefault();
        $("html, body").animate(
          {
            scrollTop: 0,
          },
          "300"
        );
      });
    },

    salActivation: function () {
      sal({
        threshold: 0.1,
        once: true,
      });
    },
    intializeSlick: function (e) {
      if ($(".donors-slider").length) {
        $(".donors-slider").slick({
          infinite: true,
          slidesToShow: 1,
          padding: "50px",
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 2000,
          responsive: [
            {
              breakpoint: 1200,
              settings: {
                arrows: true,
                slidesToShow: 1,
              },
            },
            {
              breakpoint: 991,
              settings: {
                arrows: false,
                slidesToShow: 1,
              },
            },
            {
              breakpoint: 768,
              settings: {
                arrows: false,
                slidesToShow: 1,
              },
            },
            {
              breakpoint: 480,
              settings: {
                arrows: false,
                slidesToShow: 1,
              },
            },
          ],
        });
      }
      if ($(".scholars-slider").length) {
        $(".scholars-slider").slick({
          infinite: true,
          slidesToShow: 3,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 2000,
          responsive: [
            {
              breakpoint: 1200,
              settings: {
                arrows: true,
                slidesToShow: 2,
              },
            },
            {
              breakpoint: 991,
              settings: {
                arrows: true,
                slidesToShow: 1,
              },
            },
            {
              breakpoint: 768,
              settings: {
                arrows: false,
                slidesToShow: 1,
              },
            },
            {
              breakpoint: 480,
              settings: {
                arrows: false,
                slidesToShow: 1,
                autoplaySpeed: 1500,
              },
            },
          ],
        });
      }
    },
    // modalVideo: function () {
    //   $("#videoModal").on("hidden.bs.modal", function () {
    //     $("#videoModal iframe").attr(
    //       "src",
    //       $("#videoModal iframe").attr("src")
    //     );
    //   });
    // },
    // videplay: function () {
    //   $(".detail-sermon-card .play-btn").on("click", function () {
    //     $(".detail-sermon-card .img-box").hide("slow");
    //     $(".detail-sermon-card .video-box").show("slow");
    //   });
    // },
    countdownInit: function (countdownSelector, countdownTime) {
      var eventCounter = $(countdownSelector);
      if (eventCounter.length) {
        eventCounter.countdown(countdownTime, function (e) {
          $(this).html(
            e.strftime(
              '<li><span class="number">%D</span><span class="number-text">Days</span></li>\
                <li><span class="number">%H</span><span class="number-text">Hours</span></li>\
                <li><span class="number">%M</span><span class="number-text">Minutes</span></li>\
                <li><span class="number">%S</span><span class="number-text">Seconds</span></li>'
            )
          );
        });
      }
    },
  };
  alburaqInit.i();
})(window, document, jQuery);
