(function () {
  const w = window;
  w.config = w.config || {};
  const c = w.config;

  c.city = c.city ?? "Goiana";
  c.state = c.state ?? "PE";
  c.ibge_codes = c.ibge_codes ?? "2606200";
  c.logo = c.logo ?? null;
  c.slogan = c.slogan ?? "";
  c.map = c.map || { lat: -7.560556, lng: -35.0025, zoom: 12 };

  c.video_intro_url =
    c.video_intro_url ??
    "https://www.youtube.com/embed/ltXDgjS-XpA?html5=1";

  c.token =
    c.token ?? "O1oS2c032JHxnclkS7kpfKfsi2ey7DLT";

  c.config = c.config || {};
  c.config.allow_preregistration_data_update =
    c.config.allow_preregistration_data_update ?? false;
  c.config.allow_preregistration_cancel =
    c.config.allow_preregistration_cancel ?? false;

  c.allow_preregistration_data_update =
    c.allow_preregistration_data_update ?? c.config.allow_preregistration_data_update;
  c.allow_preregistration_cancel =
    c.allow_preregistration_cancel ?? c.config.allow_preregistration_cancel;

  c.entity = c.entity || {};
  c.entity.config = c.entity.config || {};
  c.entity.config.allow_preregistration_data_update =
    c.entity.config.allow_preregistration_data_update ?? c.config.allow_preregistration_data_update;
  c.entity.config.allow_preregistration_cancel =
    c.entity.config.allow_preregistration_cancel ?? c.config.allow_preregistration_cancel;

  c.prematricula = c.prematricula || {};
  c.prematricula.config = c.prematricula.config || {};
  c.prematricula.config.allow_preregistration_data_update =
    c.prematricula.config.allow_preregistration_data_update ?? c.config.allow_preregistration_data_update;
  c.prematricula.config.allow_preregistration_cancel =
    c.prematricula.config.allow_preregistration_cancel ?? c.config.allow_preregistration_cancel;

  w.__PMD_CONFIG_LOADED__ = true;
})();
