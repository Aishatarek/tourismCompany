import React, { useEffect, useRef, useState } from "react";
import { Container, Row, Col } from "react-bootstrap";
import { BsShield, BsPeople, BsSunrise } from "react-icons/bs";
import { FaPeopleArrows, FaStar } from "react-icons/fa";
import { AiOutlineCloudDownload } from "react-icons/ai";
import { Swiper, SwiperSlide } from "swiper/react";
import { Navigation, Pagination, Autoplay } from "swiper";
import Footer from "./Footer";
import { Link } from "react-router-dom";
import { MdManageAccounts, MdOutlineEngineering } from "react-icons/md";
import { IoIosPeople, IoIosPerson } from "react-icons/io";
import { Element } from "react-scroll";
import { FaFacebookF } from "react-icons/fa";
import { FaInstagram } from "react-icons/fa";
import { CiTwitter } from "react-icons/ci";
import { SiYourtraveldottv } from "react-icons/si";
import { PiMedal, PiMountainsThin } from "react-icons/pi";
import { TfiHeadphoneAlt, TfiQuoteRight } from "react-icons/tfi";
import { FaPersonWalkingLuggage } from "react-icons/fa6";
import { GiTakeMyMoney } from "react-icons/gi";
import axios from "axios";
import Modal from "react-bootstrap/Modal";
import { useTranslation } from "react-i18next";
import emailjs from "@emailjs/browser";
import { MdOutlineSlowMotionVideo } from "react-icons/md";
import Button from "react-bootstrap/Button";
function About() {
  const [team, setTeam] = useState([]);
  const [show, setShow] = useState(false);
  const [iddd, setIddd] = useState(0);
  const { t, i18n } = useTranslation();
  const [reviews, setReviews] = useState([]);
  const form4 = useRef();
  const sendEmail4 = (e) => {
    alert("Message sent successfully");
    e.preventDefault();
    emailjs
      .sendForm(
        "service_tfpjcb4",
        "template_hhavxaq",
        form4.current,
        "6VEs_wJJ1GfhmXXZx"
      )
      .then(
        (result) => {
          console.log(result.text);
        },
        (error) => {
          console.log(error.text);
        }
      );
    e.target.reset();
  };
  useEffect(() => {
    loadTeam();
    loadReviews();
  }, []);
  const changeLanguage = (lng) => {
    i18n.changeLanguage(lng);
  };
  const loadTeam = async () => {
    const result = await axios.get(
      "https://elagamy-eg.com/dashboard/team/readAll.php"
    );
    setTeam(result.data.reverse());
  };
  const handleShowee = (idd = 0) => {
    setIddd(idd);
    setShow(true);
  };
  const loadReviews = async () => {
    const result = await axios.get(
      "https://elagamy-eg.com/dashboard/reviews/readAll.php"
    );
    setReviews(result.data.reverse());
  };
  const handleClose = () => setShow(false);
  return (
    <>
      <section className="aboutsec1">
        <div className="fadeInUp wow" data-wow-duration="0.5s">
          <h3>{t("About")}</h3>
          <p>{t("travelagency")}</p>
        </div>
      </section>
      <section className="aboutsec2">
        <Container>
          <Row>
            <Col lg="6" md="6" sm="12">
              <div className="slideInLeft wow" data-wow-duration="0.5s">
                <p>{t("aboutdesc")}</p>
                <ul>
                  <li>
                    <span>{t("aboutdesc2")}</span>
                  </li>
                  <li>
                    <span>{t("aboutdesc3")}</span>
                  </li>
                </ul>
                <Link to="/Tours">
                  {" "}
                  <button>{t("aboutdescbutn")}</button>
                </Link>
              </div>
            </Col>
            <Col lg="6" md="6" sm="12" className="imgsabout">
              <img
                className="slideInRight wow"
                data-wow-duration="0.5s"
                src="images/feature3.png"
                alt=""
              />
              <img
                className="slideInRight wow"
                data-wow-duration="0.5s"
                src="images/feature4.png"
                alt=""
              />
            </Col>
          </Row>
        </Container>
      </section>
      <section className="aboutsec3">
        <div className="repeativeDiv">
          <p>{t("TOURGUIDE")}</p>
          <h2>{t("MeetExcellent")}</h2>
          <div className="borderdivs">
            <div className="leftBorder"></div>
            <img src="images/logo.png" alt="" />

            <div className="rightBorder"></div>
          </div>
        </div>

        <Container>
          <Row>
            {team.slice(0, 3).map((teamm, index) => (
              <Col lg="4" md="4" sm="12">
                <div key={teamm.id} onClick={() => handleShowee(index)}>
                <div className="playUp">
                      <MdOutlineSlowMotionVideo className="palyerIcon"/>
                    <img
                      src={
                        "https://elagamy-eg.com/uploads/teams/" + teamm.img
                      }
                      alt=""
                    />
                    {/* <div class="social-area">
                    <ul class="guide-social">
                      <li>
                        <a href="#">
                          <FaFacebookF />
                        </a>
                      </li>

                      <li>
                        <a href="#">
                          <FaInstagram />
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <CiTwitter />
                        </a>
                      </li>
                    </ul>
                  </div> */}
                  </div>
                  <h3>{t("dir") == "ltr" ? teamm.name : teamm.name_ar}</h3>
                  <p>
                    {t("dir") == "ltr"
                      ? teamm.description
                      : teamm.description_ar}
                  </p>
                </div>
              </Col>
            ))}
          </Row>
        </Container>
      </section>
      <section className="homesec9">
        <div className="repeativeDiv">
          <p>{t("CATEGORY")}</p>
          <h2>{t("PopularTours")}</h2>
          <div className="borderdivs">
            <div className="leftBorder"></div>
            <img src="images/logo.png" alt="" />

            <div className="rightBorder"></div>
          </div>
        </div>

        <Container>
          <Row>
            <Col lg="3" md="3" sm="12">
              <div>
                <div>
                  <SiYourtraveldottv />
                </div>
                <h3>400+</h3>
                <p>{t("AwesomeTour")}</p>
              </div>
            </Col>
            <Col lg="3" md="3" sm="12">
              <div>
                <div>
                  <FaPersonWalkingLuggage />
                </div>
                <h3>250+</h3>
                <p>{t("StunningPlaces")}</p>
              </div>
            </Col>
            <Col lg="3" md="3" sm="12">
              <div>
                <div>
                  <PiMedal />
                </div>
                <h3>1050+</h3>
                <p>{t("Customer")}</p>
              </div>
            </Col>
            <Col lg="3" md="3" sm="12">
              <div>
                <div>
                  <IoIosPeople />
                </div>
                <h3>500+</h3>
                <p>{t("Guides")}</p>
              </div>
            </Col>
          </Row>
        </Container>
      </section>
      <section className="homesec10">
        <Container fluid>
          <Row style={{ direction: "ltr" }}>
            <Col lg="6" md="6" sm="12" className="opinionRow">
              <TfiQuoteRight className="qote10" />

              <Swiper
                spaceBetween={30}
                modules={[Autoplay]}
                autoplay={{
                  delay: 2000,
                  disableOnInteraction: false,
                }}
                loop={true}
                className="mySwiper"
              >
                {reviews.map((review) => (
                  <SwiperSlide>
                    <div className="testimonial-single1">
                      <div className="testimonial-content">
                        <ul className="star-list">
                          <li>
                            <FaStar />
                          </li>
                          <li>
                            <FaStar />
                          </li>
                          <li>
                            <FaStar />
                          </li>
                          <li>
                            <FaStar />
                          </li>
                          <li>
                            <FaStar />
                          </li>
                        </ul>

                        <p>“{review.opinion}”</p>
                      </div>
                      <div className="testi-author1">
                        <div className="image">
                          {/* <img
                          decoding="async"
                          src="https://astrip-wp.b-cdn.net/wp-content/uploads/2022/10/testi11.png"
                          alt=""
                        /> */}
                        </div>
                        <div className="author-text">
                          <h5>{review.name}</h5>

                          <p>{review.country}</p>
                        </div>
                      </div>
                    </div>
                  </SwiperSlide>
                ))}
              </Swiper>
            </Col>
            <Col lg="6" md="6" sm="12" className="banner8">
              <div className="banner-form-box" ref={form4} onSubmit={sendEmail4}>
                <h3>{t("Experiment")}</h3>
                <p>{t("ensuring")}</p>
                <form className="newsletter-form">
                  <input type="text" name="name" placeholder={t("Name")} />
                  <input
                    type="email"
                    name="email"
                    placeholder={t("Email")}
                    required=""
                  />
                  <textarea
                    placeholder={t("Messagehere")}
                    required=""
                    name="message"
                  ></textarea>
                  <button type="submit">{t("Join")}</button>
                </form>
              </div>
            </Col>
          </Row>
        </Container>
      </section>
      <section className="aboutsec6">
        <div className="repeativeDiv">
          <p>{t("TRAVELCATEGORY")}</p>
          <h2>{t("PopularTours")}</h2>
          <div className="borderdivs">
            <div className="leftBorder"></div>
            <img src="images/logo.png" alt="" />

            <div className="rightBorder"></div>
          </div>
        </div>

        <Container>
          <Row>
            <Col lg="3" md="3" sm="12">
              <div>
                <div>
                  <GiTakeMyMoney />
                </div>
                <h3>{t("aboutsec3div1")}</h3>
                <p>{t("aboutsec3div2")}</p>
              </div>
            </Col>
            <Col lg="3" md="3" sm="12">
              <div>
                <div>
                  <FaPersonWalkingLuggage />
                </div>
                <h3>{t("aboutsec3div3")}</h3>
                <p>{t("aboutsec3div4")}</p>
              </div>
            </Col>
            <Col lg="3" md="3" sm="12">
              <div>
                <div>
                  <PiMountainsThin />
                </div>
                <h3>{t("aboutsec3div5")}</h3>
                <p>{t("aboutsec3div6")}</p>
              </div>
            </Col>
            <Col lg="3" md="3" sm="12">
              <div>
                <div>
                  <TfiHeadphoneAlt />
                </div>
                <h3>{t("aboutsec3div7")}</h3>
                <p>
                  {t("aboutsec3div8")}
                </p>
              </div>
            </Col>
          </Row>
        </Container>
      </section>

      {show ? (
        <Modal
          show={show}
          onHide={handleClose}
          className="projectmodal"
          centered
        >
          <Modal.Header>
          <Button variant="" onClick={handleClose}>X</Button>
          </Modal.Header>
          <Modal.Body>
            <div className="mySwiper">
              {team[iddd].video ? (
                <div>
                  <video
                    controls
                    width="400px"
                    src={
                      "https://elagamy-eg.com/uploads/teams/" +
                      team[iddd].video
                    }
                  ></video>
                </div>
              ) : null}
            </div>
          </Modal.Body>
        </Modal>
      ) : null}
      <Footer />
    </>
  );
}

export default About;
