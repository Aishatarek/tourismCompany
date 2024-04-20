import React, { useState, useEffect } from "react";
import axios from "axios";
import { Card } from "react-bootstrap";
import { Container, Row, Col } from "react-bootstrap";
import Footer from "./Footer";
import { BsArrowRight } from "react-icons/bs";
import { Swiper, SwiperSlide } from "swiper/react";
import { Navigation, Pagination, Autoplay } from "swiper";
import Modal from "react-bootstrap/Modal";
import { Link } from "react-router-dom";
import { useTranslation } from "react-i18next";
import { MdOutlineSlowMotionVideo } from "react-icons/md";
import Button from "react-bootstrap/Button";

function Team() {

  const [team, setTeam] = useState([]);
  const [show, setShow] = useState(false);
  const [iddd, setIddd] = useState(0);
  const { t, i18n } = useTranslation();

  useEffect(() => {
    loadTeam();
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
  const handleClose = () => setShow(false);


  return (
    <>
      <section className="aboutsec1">
        <div className="fadeInUp wow" data-wow-duration="0.5s">
          <h3>{t("MeetTeam")}</h3>
        </div>
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
            {team.map((teamm,index) => (
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
                  <p>{t("dir") == "ltr" ? teamm.description : teamm.description_ar}</p>
                </div>
              </Col>
            ))}
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
            <div
              className="mySwiper"
            >
              {team[iddd].video ? (
                <div>
                  <video controls width="400px" src={'https://elagamy-eg.com/uploads/teams/' + team[iddd].video}  ></video>
                </div>
              ) :  <img
              src={
                "https://elagamy-eg.com/uploads/teams/" + team[iddd].img
              }
              alt=""
            />}
             
           
            </div>
          </Modal.Body>
       
        </Modal>
      ) : null}
      <Footer />
    </>
  );
}

export default Team;
