import React, { useState, useEffect } from "react";
import axios from "axios";
import { useHistory, useParams } from "react-router-dom";
import Slider from "react-slick";
import { Container, Row, Col } from "react-bootstrap";
import { FiInstagram } from "react-icons/fi";
import { AiOutlineTwitter, AiFillFacebook } from "react-icons/ai";
import Footer from "./Footer";
import { Link } from "react-router-dom";
import { useTranslation } from "react-i18next";
import ScrollToTop from "./ScrollToTop";

const DestinationDetail = () => {
  const { id } = useParams();
  const [destination, setDestination] = useState([]);
  const [tours, setTours] = useState([]);
  const [destinationDesc, setDestinationDesc] = useState([]);
  const [packages, setPackages] = useState([]);

  const { t, i18n } = useTranslation();

  useEffect(() => {
    loadDestination();
    loadTours();
    loadDestinationDesc();
    loadPackages();

  }, []);
  const changeLanguage = (lng) => {
    i18n.changeLanguage(lng);
  };
  const loadTours = async () => {
    const result = await axios.get(
      "https://www.elagamy-eg.com/dashboard/tours/readAll.php"
    );
    setTours(result.data.reverse());
  };
  const loadPackages = async () => {
    const result = await axios.get(
      "https://www.elagamy-eg.com/dashboard/packages/readAll.php"
    );
    setPackages(result.data.reverse());
  };
  const loadDestination = async () => {
    const result = await axios.get(
      `https://www.elagamy-eg.com/dashboard/destination/readAll.php/?id=${id}`
    );

    setDestination(result.data);
  };
  const loadDestinationDesc = async () => {
    const result = await axios.get(
      `https://www.elagamy-eg.com/dashboard/destination_desc/readAll.php`
    );

    setDestinationDesc(result.data);
  };
  //   console.log(destination.title);

  return (
    <div>
                <ScrollToTop />

      <section
        className="aboutsec1"
        style={{
          backgroundImage:
            destination && destination.img
              ? `url(https://www.elagamy-eg.com/uploads/destinations/${destination.img})`
              : "none",
        }}
      >
        <div className="fadeInUp wow" data-wow-duration="0.5s">
          <h3>
            {destination && destination.title_en
              ? t("dir") == "ltr"
                ? destination.title_en
                : destination.title_ar
              : null}
          </h3>
        </div>
      </section>
      <section className="tourSec1">
        <div className="repeativeDiv">
          <p>
            {" "}
            {destination && destination.title_en
              ? t("dir") == "ltr"
                ? destination.title_en
                : destination.title_ar
              : null}
          </p>
          <h2>{t("ElAgamyTours")}</h2>
          <div className="borderdivs">
            <div className="leftBorder"></div>
            <div className="rightBorder"></div>
          </div>
        </div>

        <Container>
          <Row>
            {tours.map((tour) => (
              <>
                {tour.destenation_id == id ? (
                  <Col lg="4" md="4" sm="12">
                    <Link to={`/Tours/${tour.id}`}>
                      <div>
                        <div>
                          <img
                            src={
                              "https://www.elagamy-eg.com/uploads/tours/" +
                              tour.img
                            }
                            alt=""
                          />
                          {/* <div className="discount-package">
                    <p>48%</p>
                    </div> */}
                        </div>
                        <h3>
                          {t("dir") == "ltr" ? tour.title : tour.title_ar}
                        </h3>
                        <p>
                          <span>
                            {t("FROM")} ${tour.price}
                          </span>
                        </p>
                        <button>{t("EXPLORE")}</button>
                      </div>
                    </Link>
                  </Col>
                ) : (
                  ""
                )}
              </>
            ))}
          </Row>
        </Container>
      </section>
      <section className="tourSec1">
        <div className="repeativeDiv">
          <p>
            {" "}
            {destination && destination.title_en
              ? t("dir") == "ltr"
                ? destination.title_en
                : destination.title_ar
              : null}
          </p>
          <h2>{t("BestPackages")}</h2>
          <div className="borderdivs">
            <div className="leftBorder"></div>
            <div className="rightBorder"></div>
          </div>
        </div>

        <Container>
          <Row>
            {packages.map((packagee) => (
              <>
                {packagee.destination_id == id ? (
                  <Col lg="4" md="4" sm="12">
                    <Link to={`/Packages/${packagee.id}`}>
                      <div>
                        <div>
                          <img
                            src={
                              "https://www.elagamy-eg.com/uploads/packages/" +
                              packagee.img
                            }
                            alt=""
                          />
                          {/* <div className="discount-package">
                    <p>48%</p>
                    </div> */}
                        </div>
                        <h3>
                          {t("dir") == "ltr" ? packagee.title_en : packagee.title_ar}
                        </h3>
                        <p>
                          <span>
                            {t("FROM")} ${packagee.price}
                          </span>
                        </p>
                        <button>{t("EXPLORE")}</button>
                      </div>
                    </Link>
                  </Col>
                ) : (
                  ""
                )}
              </>
            ))}
          </Row>
        </Container>
      </section>
      <section>
        <Container>
          {destinationDesc.map((destinationDescc) => (
            <>
              {destination && destination.id ? (
                destinationDescc.destination_id == destination.id ? (
                  <div
                    className="ssecblog wow slideInRight"
                    data-wow-duration="2s"
                    data-wow-delay="0.2s"
                  >
                    <h3>{destinationDescc.title}</h3>
                    <p>{destinationDescc.description}</p>
                  </div>
                ) : (
                  ""
                )
              ) : (
                ""
              )}
            </>
          ))}
        </Container>
      </section>
      <Footer />
    </div>
  );
};

export default DestinationDetail;
