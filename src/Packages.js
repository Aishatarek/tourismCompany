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
import { FaRegClock } from "react-icons/fa";
import { useTranslation } from "react-i18next";
function Packages() {
  const [packages, setPackages] = useState([]);
  const { t, i18n } = useTranslation();

  useEffect(() => {
    loadPackages();
  }, []);

  const changeLanguage = (lng) => {
    i18n.changeLanguage(lng);
  };
  const loadPackages = async () => {
    const result = await axios.get(
      "https://elagamy-eg.com/dashboard/packages/readAll.php"
    );
    setPackages(result.data.reverse());
  };

  return (
    <>
      <section className="aboutsec1">
        <div className="fadeInUp wow" data-wow-duration="0.5s">
          <h3>{t("Packages")}</h3>
          <p>{t("Get")} </p>
        </div>
      </section>
      <section className="homesec8">
        <div className="repeativeDiv">
          <p>{t("CHOOSEPACKAGE")}</p>
          <h2>{t("Get2")}</h2>
          <div className="borderdivs">
            <div className="leftBorder"></div>
            <img src="images/logo.png" alt="" />

            <div className="rightBorder"></div>
          </div>
        </div>
        <Container>
          <Row className="mySwiper fadeInUp wow" data-wow-duration="0.5s">
            {packages.map((packagee) => (
              <Col md="4" sm="12">
                <div>
                  <img
                    src={
                      "https://elagamy-eg.com/uploads/packages/" +
                      packagee.img
                    }
                    alt=""
                  />
                  <div className="content">
                    <p>
                      <span>
                        {t("FROM")} ${packagee.price}{" "}
                      </span>
                      {packagee.sale == 1 ? (
                        <>
                          / <del> ${packagee.old_price} </del>
                        </>
                      ) : (
                        ""
                      )}
                    </p>
                    <h4>
                      {t("dir") == "ltr"
                        ? packagee.title_en
                        : packagee.title_ar}
                    </h4>
                    <div className="best-plan-meta">
                      {/* <span className="duration">
                      <FaRegClock />8 Days / 9 Night{" "}
                    </span> */}
                      <span className="rating"></span>
                    </div>
                    <div className="list-area">
                      <h4>{t("Included")}</h4>
                      <ul className="plan-list1">
                        <li>
                          <span>-</span>
                          {t("dir") == "ltr"
                            ? packagee.included_en
                            : packagee.included_ar}
                        </li>
                      </ul>
                    </div>
                    <Link
                      to={`/Packages/${packagee.id}`}
                      className="eg-btn btn--primary-outline btn--md"
                    >
                      {t("EXPLORE")}
                    </Link>
                  </div>
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

export default Packages;
