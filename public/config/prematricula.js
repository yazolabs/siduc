(function () {
  window.config = window.config || {};

  window.config.city = window.config.city ?? "";
  window.config.state = window.config.state ?? "PE";
  window.config.ibge_codes = window.config.ibge_codes ?? "2606200";

  window.config.logo = window.config.logo ?? null;
  window.config.slogan = window.config.slogan ?? "";

  window.config.map = window.config.map || {
    lat: -7.560556,
    lng: -35.0025,
    zoom: 12,
  };

  window.config.video_intro_url =
    window.config.video_intro_url ??
    "https://www.youtube.com/embed/ltXDgjS-XpA?html5=1";

  window.config.token =
    window.config.token ?? "O1oS2c032JHxnclkS7kpfKfsi2ey7DLT";

  window.config.allow_optional_address =
    window.config.allow_optional_address ?? false;

  window.config.show_how_to_do_video =
    window.config.show_how_to_do_video ?? false;

  window.config.link_to_restrict_area =
    window.config.link_to_restrict_area ?? "";

  window.config.features = window.config.features || {};
  window.config.features.allow_preregistration_data_update =
    window.config.features.allow_preregistration_data_update ?? false;
  window.config.features.allow_external_system_data_update =
    window.config.features.allow_external_system_data_update ?? false;
  window.config.features.allow_transfer_registration =
    window.config.features.allow_transfer_registration ?? false;
  window.config.features.transfer_description =
    window.config.features.transfer_description ?? "";
  window.config.features.allow_vacancy_certificate =
    window.config.features.allow_vacancy_certificate ?? false;

  window.config.config = window.config.config || {};
  window.config.config.allow_preregistration_data_update =
    window.config.config.allow_preregistration_data_update ?? false;
  window.config.config.allow_preregistration_cancel =
    window.config.config.allow_preregistration_cancel ?? false;

  window.__PMD_CONFIG_LOADED__ = true;
})();
