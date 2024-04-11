(function (global, factory) {
  // Module system definitions
  typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory() :
  typeof define === 'function' && define.amd ? define(factory) :
  (global = typeof globalThis !== 'undefined' ? globalThis : global || self, global.config = factory());
})(this, (function () {
  'use strict';

  // Mapping of query parameters to config properties
  const configQueryMap = {
      "navbar-vertical-collapsed": "phoenixIsNavbarVerticalCollapsed",
      "color-scheme": "phoenixTheme",
      "navigation-type": "phoenixNavbarPosition",
      "vertical-navbar-appearance": "phoenixNavbarVerticalStyle",
      "horizontal-navbar-shape": "phoenixNavbarTopShape",
      "horizontal-navbar-appearance": "phoenixNavbarTopStyle"
  };

  // Initial configuration values
  const initialConfig = {
      phoenixIsNavbarVerticalCollapsed: false,
      phoenixTheme: "light",
      phoenixNavbarTopStyle: "dark",
      phoenixNavbarVerticalStyle: "default",
      phoenixNavbarPosition: "vertical",
      phoenixNavbarTopShape: "default",
      phoenixIsRTL: false,
      phoenixSupportChat: true
  };

  // Configuration object
  const CONFIG = { ...initialConfig };

  // Function to set configuration
  const setConfig = (config, persist = true) => {
      Object.keys(config).forEach((key) => {
          CONFIG[key] = config[key];
          if (persist) localStorage.setItem(key, config[key]);
      });
  };

  // Function to reset configuration to initial values
  const resetConfig = () => {
      Object.keys(initialConfig).forEach((key) => {
          CONFIG[key] = initialConfig[key];
          localStorage.setItem(key, initialConfig[key]);
      });
  };

  // Parse URL parameters
  const urlSearchParams = new URLSearchParams(window.location.search);
  const params = Object.fromEntries(urlSearchParams.entries());

  // Apply URL parameters to configuration
  if (Object.keys(params).length > 0 && Object.keys(params).includes("theme-control")) {
      resetConfig();
      Object.keys(params).forEach((key) => {
          if (configQueryMap[key]) {
              localStorage.setItem(configQueryMap[key], params[key]);
          }
      });
  }

  // Initialize configuration from localStorage
  Object.keys(CONFIG).forEach((key) => {
      if (localStorage.getItem(key) === null) {
          localStorage.setItem(key, CONFIG[key]);
      } else {
          try {
              setConfig({ [key]: JSON.parse(localStorage.getItem(key)) });
          } catch {
              setConfig({ [key]: localStorage.getItem(key) });
          }
      }
  });

  // Apply configuration classes to document element
  if (JSON.parse(localStorage.getItem("phoenixIsNavbarVerticalCollapsed"))) {
      document.documentElement.classList.add("navbar-vertical-collapsed");
  }
  if (localStorage.getItem("phoenixTheme") === "dark") {
      document.documentElement.classList.add("dark");
  }
  if (localStorage.getItem("phoenixNavbarPosition") === "horizontal") {
      document.documentElement.classList.add("navbar-horizontal");
  }
  if (localStorage.getItem("phoenixNavbarPosition") === "combo") {
      document.documentElement.classList.add("navbar-combo");
  }

  // Export configuration object
  var config = { config: CONFIG, reset: resetConfig, set: setConfig };

  return config;
}));
//# sourceMappingURL=config.js.map
