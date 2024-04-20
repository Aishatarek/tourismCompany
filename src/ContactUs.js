import React, { useState, useEffect, useRef } from "react";
import Footer from "./Footer";
import { Container, Row, Col } from "react-bootstrap";
import { FaFacebookF } from "react-icons/fa";
import { ImLinkedin2 } from "react-icons/im";
import { BsTelephone } from "react-icons/bs";
import { GoLocation } from "react-icons/go";
import emailjs from "@emailjs/browser";
import { IoLocationOutline } from "react-icons/io5";
import { MdOutlineEmail, MdOutlinePhoneInTalk } from "react-icons/md";
import { useTranslation } from "react-i18next";
function ContactUs() {
  const form = useRef();
  const sendEmail = (e) => {
    alert("Message sent successfully");
    e.preventDefault();
    emailjs
      .sendForm(
        "service_tfpjcb4",
        "template_hhavxaq",
        form.current,
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
  const { t, i18n } = useTranslation();
  const changeLanguage = (lng) => {
    i18n.changeLanguage(lng);
  };
  return (
    <>
      <section className="aboutsec1">
        <div className="fadeInUp wow" data-wow-duration="0.5s">
          <h3>{t("ContactUs")}</h3>
          <p>{t("Lettogether")}</p>
        </div>
      </section>
      <section className="contactsec1">
        <div className="repeativeDiv">
          <h2>{t("ElAgamyAgency")}</h2>
          <div className="borderdivs">
            <div className="leftBorder"></div>
            <img src="images/logo.png" alt="" />

            <div className="rightBorder"></div>
          </div>
        </div>

        <Container>
          <Row>
            <Col lg="4" md="4" sm="12">
              <div>
                <div>
                  <IoLocationOutline />
                </div>
                <h3>{t("Location")}</h3>
                <p>{t("AdressDesc")}</p>
              </div>
            </Col>
            <Col lg="4" md="4" sm="12">
              <div>
                <div>
                  <MdOutlinePhoneInTalk />
                </div>
                <h3>{t("Call")}</h3>
                <p>+20 101 232 9962</p>
              </div>
            </Col>
            <Col lg="4" md="4" sm="12">
              <div>
                <div>
                  <MdOutlineEmail />
                </div>
                <h3>{t("Email1")}</h3>
                <p>info@elagamy-eg.com</p>
              </div>
            </Col>
          </Row>
        </Container>
      </section>
      <section className="contactsec2">
        <div className="repeativeDiv">
          <p>{t("ContactFORM")}</p>
          <h2>{t("Lettouch")}</h2>
          <div className="borderdivs">
            <div className="leftBorder"></div>
            <img src="images/logo.png" alt="" />

            <div className="rightBorder"></div>
          </div>
        </div>

        <Container>
          <div className="slideInRight wow " data-wow-duration="0.5s">
            <div className="contactform">
              <form ref={form} onSubmit={sendEmail}>
                <div>
                  <input
                    type="text"
                    name="name"
                    placeholder={t("YourName")}
                  />
                </div>
                <div>
                  <input
                    type="text"
                    name="subject"
                    placeholder={t("TypeSubject")}
                  />
                </div>
                <div>
                  <input
                    type="email"
                    name="email"
                    placeholder={t("YourEmail")}
                  />
                </div>
                <div>
                  <input type="tel" name="phone" placeholder={t("YourPhone")} />
                </div>
                <div>
                  <textarea
                    name="message"
                    placeholder={t("YourMessage")}
                  ></textarea>
                </div>
                <button type="submit">{t("SendNow")}</button>
              </form>
            </div>
          </div>
        </Container>
      </section>
      <section className="contactsec3">
        <img src="images/map.jpg" alt="" />
        <div className="location"></div>
        <div className="info">
          <h3>{t("Address")}</h3>
          <div className="d-flex my-1">
            <GoLocation />
            <p>{t("AdressDesc")}</p>
          </div>
          <div className="d-flex my-1">
            <BsTelephone />
            <p>+20 101 232 9962 </p>
          </div>
        </div>
      </section>
      <Footer />
    </>
  );
}

export default ContactUs;
