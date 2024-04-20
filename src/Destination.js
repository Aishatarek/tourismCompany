import React, { useState, useEffect } from "react";
import axios from "axios";
import { Card } from "react-bootstrap";
import { Container, Row, Col } from "react-bootstrap";
import Footer from "./Footer";
import { BsArrowRight } from "react-icons/bs";
import { Swiper, SwiperSlide } from "swiper/react";
import { Navigation, Pagination, Autoplay } from "swiper";
import Button from "react-bootstrap/Button";
import Modal from "react-bootstrap/Modal";
import { Link } from "react-router-dom";
import { useTranslation } from "react-i18next";

function Destination() {
  const [destinations, setDestination] = useState([]);
  const { t, i18n } = useTranslation();

  useEffect(() => {
    loadDestination();
  }, []);
  const changeLanguage = (lng) => {
    i18n.changeLanguage(lng);
  };
  const loadDestination = async () => {
    const result = await axios.get(
      "https://www.elagamy-eg.com/dashboard/destination/readAll.php"
    );
    setDestination(result.data);
  };
  return (
    <>
      <section className="aboutsec1">
        <div className="fadeInUp wow" data-wow-duration="0.5s">
          <h3>{t("Destinations")}</h3>
        </div>
      </section>
      <section className="Destination1">
        <div className="repeativeDiv">
          <p>{t("Destinations")}</p>
          <h2>{t("ElAgamyDestinations")}</h2>
          <div className="borderdivs">
            <div className="leftBorder"></div>
            <img src="images/logo.png" alt="" />

            <div className="rightBorder"></div>
          </div>
        </div>
        <Container>
          <Row>
            {destinations.map((destination) => (
              <Col lg="3" md="3" sm="12">
                <div>
                  <img
                    src={
                      "https://www.elagamy-eg.com/uploads/destinations/" +
                      destination.img
                    }
                    alt=""
                  />
                  <Link to={`/Destination/${destination.id}`}>
                    <div>
                      <h3>
                        {" "}
                        {t("dir") == "ltr"
                          ? destination.title_en
                          : destination.title_ar}
                      </h3>
                    </div>
                  </Link>
                </div>
              </Col>
            ))}
          </Row>
        </Container>
      </section>

      <Footer />
    </>
  );
}

export default Destination;
