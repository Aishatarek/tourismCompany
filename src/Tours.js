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

function Tours() {
  const [tours, setTours] = useState([]);
  const { t, i18n } = useTranslation();

  useEffect(() => {
    loadTours();
  }, []);

  const changeLanguage = (lng) => {
    i18n.changeLanguage(lng);
  };
  const loadTours = async () => {
    const result = await axios.get(
      "https://elagamy-eg.com/dashboard/tours/readAll.php"
    );
    setTours(result.data.reverse());
  };

  return (
    <>
      <section className="aboutsec1">
        <div className="fadeInUp wow" data-wow-duration="0.5s">
          <h3>{t("tours")}</h3>
          <p>{t("Get")}</p>
        </div>
      </section>
      <section className="tourSec1">
        <div className="repeativeDiv">
          <p>{t("tours")}</p>
          <h2>{t("ElAgamyTours")}</h2>
          <div className="borderdivs">
            <div className="leftBorder"></div>
            <div className="rightBorder"></div>
          </div>
        </div>

        <Container>
          <Row>
            {tours.map((tour) => (
              <Col lg="4" md="4" sm="12">
                <div>
                  <div>
                    <Link to={`/Tours/${tour.id}`}>
                      <img
                        src={
                          "https://elagamy-eg.com/uploads/tours/" + tour.img
                        }
                        alt=""
                      />
                    </Link>
                    {/* <div className="discount-package">
                    <p>48%</p>
                  </div> */}
                  </div>
                  <h3>{t("dir") == "ltr" ? tour.title : tour.title_ar}</h3>
                  <p>
                    <span>
                      {t("FROM")} ${tour.price}
                    </span>
                  </p>
                  <Link to={`/Tours/${tour.id}`}>
                    <button>{t("EXPLORE")}</button>
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

export default Tours;
