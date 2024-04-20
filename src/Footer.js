import React from "react";
import Container from "react-bootstrap/Container";
import { Row, Col } from "react-bootstrap";
import { AiFillPhone } from "react-icons/ai";
import { FaFacebookF } from "react-icons/fa";
import { ImLinkedin2, ImLocation2 } from "react-icons/im";
import { MdEmail } from "react-icons/md";
import { Link } from "react-router-dom";
import { useTranslation } from "react-i18next";
function Footer() {
  const { t, i18n } = useTranslation();

  const changeLanguage = (lng) => {
    i18n.changeLanguage(lng);
  };
  return (
    <footer>
      <Container>
        <Row>
          <Col
            lg="3"
            md="3"
            sm="12"
            className="wow fadeInLeft span12"
            data-wow-duration="0.5s"
          >
            <img src="/images/logoo.png" alt="" />
          </Col>
          <Col
            lg="3"
            md="3"
            sm="12"
            className="wow fadeInDown span12"
            data-wow-duration="0.5s"
          >
            <h5>{t("Links")}</h5>
            <div>
              <Link to="/">{t("Home")} </Link>
              <Link to="/About">{t("About")}</Link>
              <Link to="/ContactUs">{t("contact")} </Link>
              <Link to="/Blog">{t("Blog")}</Link>
              <Link to="/Destination">{t("Destination")}</Link>
              <Link to="/Packages">{t("Packages")}</Link>
              <Link to="/Team">{t("Team")}</Link>
            </div>
          </Col>
          <Col
            lg="3"
            md="3"
            sm="12"
            className="wow fadeInUp span12"
            data-wow-duration="0.5s"
          >
            <h5>{t("WhatDo")}</h5>
            <p>{t("curate")} </p>
            <div className="iconsfooter">
              <div>
                <FaFacebookF />
              </div>
              <div>
                {" "}
                <ImLinkedin2 />
              </div>
            </div>
          </Col>
          <Col
            lg="3"
            md="3"
            sm="12"
            className="wow fadeInRight span12"
            data-wow-duration="0.5s"
          >
            <h5>{t("contacthere")}</h5>
            <div>
              <a href="#">
                <ImLocation2 /> {t("Address")}:
                <br />
                <div style={{ marginLeft: "50px" }}>{t("AdressDesc")}</div>
              </a>
              <a href="tel:+201012329962">
                <AiFillPhone /> {t("Phone")} :<br />
                <span style={{ marginLeft: "50px" }}>+20 101 232 9962</span>
                <br />
              </a>
              <a href="mailto:info@elagamy-eg.com">
                <MdEmail /> {t("Emailc")} : info@elagamy-eg.com
              </a>
            </div>
          </Col>
        </Row>
      </Container>
      <div className="copyrightDiv">© 2024 All rights reserved Created by <a href="https://website-builder-company.netlify.app/" target="_blank">Aisha Tarek</a></div>
    </footer>
  );
}

export default Footer;
