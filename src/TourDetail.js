import React, { useState, useEffect } from "react";
import { useHistory, useParams } from "react-router-dom";
import axios from "axios";
import Slider from "react-slick";
import { Container, Row, Col } from "react-bootstrap";
import { FiInstagram } from "react-icons/fi";
import { AiOutlineTwitter, AiFillFacebook } from "react-icons/ai";
import Footer from "./Footer";
import * as mdb from "mdb-ui-kit"; // lib
import { Link } from "react-router-dom";
import { Swiper, SwiperSlide } from "swiper/react";
import "swiper/css";
import "swiper/css/effect-fade";
import "swiper/css/navigation";
import "swiper/css/pagination";
import { EffectFade, Navigation, Pagination } from "swiper";
import { useTranslation } from "react-i18next";
import ScrollToTop from "./ScrollToTop";
import emailjs from "@emailjs/browser";

function TourDetail() {
  const { id } = useParams();
  const [tours, setTours] = useState([]);
  const [tourss, setTourss] = useState([]);
  const [toursImages, setTourImages] = useState([]);
  const { t, i18n } = useTranslation();

  useEffect(() => {
    loadTours();
    loadAllTours();
    loadAllTourImages();
  }, []);
  const changeLanguage = (lng) => {
    i18n.changeLanguage(lng);
  };
  const loadTours = async () => {
    const result = await axios.get(
      `https://elagamy-eg.com/dashboard/tours/readAll.php/?id=${id}`
    );
    // console.log(result.data);

    setTours(result.data);
  };
  const loadAllTours = async () => {
    const result = await axios.get(
      `https://elagamy-eg.com/dashboard/tours/readAll.php`
    );
    setTourss(result.data.reverse());
  };
  const loadAllTourImages = async () => {
    const result = await axios.get(
      `https://elagamy-eg.com/dashboard/tour_images/readAll.php`
    );
    // console.log(result);
    setTourImages(result.data.reverse());
  };
  const [user, setUser] = useState({
    tour_or_package_id: id,
    tour_or_package: "0",
    name: "",
    email: "",
    phone: "",
    date: "",
    number_adults: "",
    promo_code: "",
    address: "",
    special_inquiry: "",
  });

  const {
    tour_or_package_id,
    tour_or_package,
    name,
    email,
    phone,
    date,
    number_adults,
    promo_code,
    address,
    special_inquiry,
  } = user;

  const onInputChange = (e) => {
    setUser({ ...user, [e.target.name]: e.target.value });
  };

  const onSubmit = async (e) => {
    e.preventDefault();
    let formData = new FormData();
    formData.append("tour_or_package_id", id);
    formData.append("tour_or_package", 0);
    formData.append("name", name);
    formData.append("email", email);
    formData.append("phone", phone);
    formData.append("date", date);
    formData.append("number_adults", number_adults);
    formData.append("promo_code", promo_code);
    formData.append("address", address);
    formData.append("special_inquiry", special_inquiry);

    await axios({
      method: "post",
      url: "https://elagamy-eg.com/dashboard/orders/readAll.php",
      data: formData,
      config: { headers: { "Content-Type": "multipart/form-data" } },
    }).then(function (response) {
      alert(
        "Your reservation has been sent successfully and will be reviewed. Thank you"
      );
      const formData = {
        name: name,
        email: email,
        phone: phone,
        title: tours.title,
        description: tours.description,
        package_or_tour: "Tour",
        number_of_persons: number_adults,
        price_per_one: tours.price,
        total_one: tours.price * number_adults,
        promo_code: promo_code,
        special_inquiry: special_inquiry,
        address: address,
        options: "No Options",
      };

      emailjs
        .send(
          "service_tfpjcb4",
          "template_9nb8w8m",
          formData,
          "6VEs_wJJ1GfhmXXZx"
        )
        .then(
          (result) => {
            console.log(result.text); 
            e.target.reset();

          },
          (error) => {
            console.log(error.text); 
          }
        )
        .catch(function (response) {
          console.log(response); 
        });
    });
  };
  return (
    <div>
      <ScrollToTop />

      <section
        className="aboutsec1"
        style={{
          backgroundImage:
            tours && tours.img
              ? `url(https://elagamy-eg.com/uploads/tours/${tours.img})`
              : "",
        }}
      >
        <h3 className="wow slideInDown" data-wow-duration="2s">
          {tours && tours.title
            ? t("dir") == "ltr"
              ? tours.title
              : tours.title_ar
            : null}
        </h3>
      </section>
      <section>
        <Container>
          <Row>
            <Col lg="9" md="9" sm="12">
              <div className="divbloggg">
                <div className="tab-content" id="ex1-content">
                  <div
                    className="tab-pane fade show active"
                    id="ex1-tabs-1"
                    role="tabpanel"
                    aria-labelledby="ex1-tab-1"
                  >
                    <div>
                      <div
                        className="ssecblog  wow slideInRight"
                        data-wow-duration="2s"
                      >
                        <div
                          className="ssecblog wow slideInRight"
                          data-wow-duration="2s"
                        >
                          <h3>
                            {tours && tours.title
                              ? t("dir") == "ltr"
                                ? tours.title
                                : tours.title_ar
                              : null}
                          </h3>
                          <p>
                            {tours && tours.description
                              ? t("dir") == "ltr"
                                ? tours.description
                                : tours.description_ar
                              : null}
                          </p>
                        </div>

                        <div
                          className=" wow slideInRight"
                          data-wow-duration="2s"
                        >
                          <Swiper
                            spaceBetween={30}
                            effect={"fade"}
                            navigation={true}
                            pagination={{
                              clickable: true,
                            }}
                            modules={[EffectFade, Navigation, Pagination]}
                            className="mySwiper"
                          >
                            {toursImages.map((toursImagess) => (
                              <>
                                {tours && tours.id ? (
                                  toursImagess.tour_id == tours.id ? (
                                    <SwiperSlide>
                                      <img
                                        src={`https://elagamy-eg.com/uploads/TourImages/${toursImagess.img}`}
                                        alt=""
                                        width="100%"
                                        height="300px"
                                      />
                                    </SwiperSlide>
                                  ) : (
                                    ""
                                  )
                                ) : (
                                  ""
                                )}
                              </>
                            ))}
                          </Swiper>
                        </div>

                        <div
                          className="ssecblog wow slideInRight"
                          data-wow-duration="2s"
                        >
                          <h3>{t("Itinerary")}</h3>
                          <p>
                            {tours && tours.Itinerary
                              ? t("dir") == "ltr"
                                ? tours.Itinerary
                                : tours.Itinerary_ar
                              : null}
                          </p>
                        </div>
                        <div
                          className="ssecblog wow slideInRight"
                          data-wow-duration="2s"
                        >
                          <h3>{t("Included")}</h3>
                          <p>
                            {tours && tours.included
                              ? t("dir") == "ltr"
                                ? tours.included
                                : tours.included_ar
                              : null}
                          </p>
                        </div>
                        <div
                          className="ssecblog wow slideInRight"
                          data-wow-duration="2s"
                        >
                          <h3>{t("Excluded")}</h3>
                          <p>
                            {tours && tours.excluded
                              ? t("dir") == "ltr"
                                ? tours.excluded
                                : tours.excluded_ar
                              : null}
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </Col>
            <Col
              lg="3"
              md="3"
              sm="12"
              className=" wow slideInLeft"
              data-wow-duration="2s"
            >
              <div>
                <div className="fsecbloggg">
                  <h3>
                    {t("FROM")} ${tours && tours.price ? tours.price : null}
                  </h3>
                  <h5>{t("perPerson")}</h5>
                </div>
                <div className="imgblogg">
                  <form
                    onSubmit={(e) => onSubmit(e)}
                    encType="multipart/form-data"
                  >
                    <p>{t("Name1")}</p>
                    <input
                      type="text"
                      placeholder={t("John")}
                      className="form-control"
                      name="name"
                      value={name}
                      onChange={(e) => onInputChange(e)}
                    />
                    <p>{t("Email1")}</p>
                    <input
                      type="email"
                      placeholder="sample@mail.com"
                      name="email"
                      className="form-control"
                      value={email}
                      onChange={(e) => onInputChange(e)}
                    />
                    <p>{t("Phone1")}</p>
                    <input
                      type="tel"
                      placeholder="+1 123-123-1234"
                      className="form-control"
                      name="phone"
                      value={phone}
                      onChange={(e) => onInputChange(e)}
                    />
                    <p>{t("BookingDate1")}</p>
                    <input
                      type="date"
                      className="form-control"
                      name="date"
                      value={date}
                      onChange={(e) => onInputChange(e)}
                    />
                    <p>{t("NumberofAdults1")}</p>
                    <input
                      type="text"
                      placeholder={t("2 Persons")}
                      className="form-control"
                      name="number_adults"
                      value={number_adults}
                      onChange={(e) => onInputChange(e)}
                    />
                    <p>{t("PromoCode1")}</p>
                    <input
                      type="text"
                      placeholder={t("Docode")}
                      className="form-control"
                      name="promo_code"
                      value={promo_code}
                      onChange={(e) => onInputChange(e)}
                    />
                    <p> {t("Address")}</p>
                    <input
                      type="text"
                      placeholder={t("Address")}
                      className="form-control"
                      name="address"
                      value={address}
                      onChange={(e) => onInputChange(e)}
                    />
                    <p> {t("SpecialRequests")}</p>
                    <textarea
                      placeholder={t("Writeinquiry")}
                      className="form-control"
                      name="special_inquiry"
                      value={special_inquiry}
                      onChange={(e) => onInputChange(e)}
                    ></textarea>

                    <button type="submit">{t("InquireNow")} </button>
                  </form>
                </div>
                <h3>{t("ReleventTours")}</h3>

                {tourss
                  ? tourss.map((tourr) => (
                      <>
                        {tours.destenation_id && tours ? (
                          tourr.destenation_id ? (
                            tourr.destenation_id == tours.destenation_id &&
                            tourr.id != tours.id ? (
                              <Link to={`/Tours/${tourr.id}`}>
                                <div className="imgblogg">
                                  <img
                                    src={`https://elagamy-eg.com/uploads/tours/${tourr.img}`}
                                    alt=""
                                  />
                                  <div>
                                    <p>
                                      {t("FROM")} ${tourr.price}
                                    </p>
                                    <h5>
                                      {t("dir") == "ltr"
                                        ? tourr.excluded
                                        : tourr.excluded_ar}
                                    </h5>
                                  </div>
                                </div>
                              </Link>
                            ) : null
                          ) : (
                            ""
                          )
                        ) : null}
                      </>
                    ))
                  : null}
              </div>
            </Col>
          </Row>
        </Container>
      </section>
      <Footer />
    </div>
  );
}
export default TourDetail;
