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

// Import Swiper styles
import "swiper/css";
import "swiper/css/effect-fade";
import "swiper/css/navigation";
import "swiper/css/pagination";
import ScrollToTop from "./ScrollToTop";
import emailjs from "@emailjs/browser";

import { EffectFade, Navigation, Pagination } from "swiper";
import { useTranslation } from "react-i18next";

function PackageDetail() {
  const { id } = useParams();
  const [packages, setPackages] = useState([]);
  const [packagess, setPackagess] = useState([]);
  const [packagessDetail, setPackagessDetail] = useState([]);
  const [packagesImages, setPackagesImages] = useState([]);
  const [packageIncluded, setPackageIncluded] = useState([]);
  const [totalPrice, setTotalPrice] = useState(0);
  const [totalString, setTotalString] = useState(" ");

  const { t, i18n } = useTranslation();
  const changeLanguage = (lng) => {
    i18n.changeLanguage(lng);
  };
  useEffect(() => {
    loadPackages();
    loadAllPackages();
    loadAllPackagesDetail();
    loadAllPackagesImages();
    loadAllPackageIncluded();
  }, []);

  const handleCheckboxChange = (event) => {
    const checkboxValue = parseFloat(event.target.value);
    const isChecked = event.target.checked;
    var x = 0;
    var y = "";
    packageIncluded.forEach((packageIncludedd) => {
      if (packageIncludedd.id == checkboxValue) {
        x = packageIncludedd.price;
        y = packageIncludedd.title_en;
      }
    });
    setTotalString((prevTotalString) => {
      if (isChecked) {
        prevTotalString += "," + y + " $" + x;
      } else {
        prevTotalString = prevTotalString.split("," + y + " $" + x).join("");
      }
      return prevTotalString;
    });
    setTotalPrice((prevTotalPrice) => {
      if (isChecked) {
        return prevTotalPrice + Number(x);
      } else {
        return prevTotalPrice - Number(x);
      }
    });
  };
  console.log(totalString);
  console.log(totalPrice);

  const loadPackages = async () => {
    const result = await axios.get(
      `https://www.elagamy-eg.com/dashboard/packages/readAll.php/?id=${id}`
    );
    setPackages(result.data);
  };
  const loadAllPackages = async () => {
    const result = await axios.get(
      `https://www.elagamy-eg.com/dashboard/packages/readAll.php`
    );
    setPackagess(result.data.reverse());
  };
  const loadAllPackagesDetail = async () => {
    const result = await axios.get(
      `https://www.elagamy-eg.com/dashboard/package_desc/readAll.php`
    );
    setPackagessDetail(result.data);
  };
  const loadAllPackageIncluded = async () => {
    const result = await axios.get(
      `https://www.elagamy-eg.com/dashboard/package_included/readAll.php`
    );
    setPackageIncluded(result.data);
  };

  const loadAllPackagesImages = async () => {
    const result = await axios.get(
      `https://www.elagamy-eg.com/dashboard/packages_images/readAll.php`
    );
    // console.log(result);
    setPackagesImages(result.data.reverse());
  };
  const [user, setUser] = useState({
    tour_or_package_id: id,
    tour_or_package: "1",
    name: "",
    email: "",
    phone: "",
    date: "",
    number_adults: "",
    promo_code: "",
    address: "",
    special_inquiry: "",
    options: totalString,
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
    options,
  } = user;

  const onInputChange = (e) => {
    setUser({ ...user, [e.target.name]: e.target.value });
  };

  const onSubmit = async (e) => {
    e.preventDefault();
    let formData = new FormData();
    formData.append("tour_or_package_id", id);
    formData.append("tour_or_package", 1);
    formData.append("name", name);
    formData.append("email", email);
    formData.append("phone", phone);
    formData.append("date", date);
    formData.append("number_adults", number_adults);
    formData.append("promo_code", promo_code);
    formData.append("address", address);
    formData.append("special_inquiry", special_inquiry);
    formData.append("options", totalString);

    await axios({
      method: "post",
      url: "https://www.elagamy-eg.com/dashboard/orders/readAll.php",
      data: formData,
      config: { headers: { "Content-Type": "multipart/form-data" } },
    })
      .then(function (response) {
        alert(
          "Your reservation has been sent successfully and will be reviewed. Thank you"
        );
        const formData = {
          name: name,
          email: email,
          phone: phone,
          title: packages.title_en,
          description: packages.description_en,
          package_or_tour: "Package",
          number_of_persons: number_adults,
          price_per_one: packages.price,
          total_one:
            (Number(packages.price) + Number(totalPrice)) * number_adults,
          promo_code: promo_code,
          special_inquiry: special_inquiry,
          address: address,
          options: totalString,
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
            },
            (error) => {
              console.log(error.text);
            }
          )
          .catch(function (response) {
            console.log(response);
          });
      })
      .catch(function (response) {
        console.log(response);
      });
  };

  return (
    <div>
      <ScrollToTop />

      <section
        className="aboutsec1"
        style={{
          backgroundImage:
            packages && packages.img
              ? `url(https://www.elagamy-eg.com/uploads/packages/${packages.img})`
              : "",
        }}
      >
        <h3 className="wow slideInDown" data-wow-duration="2s">
          {packages && packages.title_en
            ? t("dir") == "ltr"
              ? packages.title_en
              : packages.title_ar
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
                            {packages && packages.title_en
                              ? t("dir") == "ltr"
                                ? packages.title_en
                                : packages.title_ar
                              : null}
                          </h3>
                          <p>
                            {packages && packages.description_en
                              ? t("dir") == "ltr"
                                ? packages.description_en
                                : packages.description_ar
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
                            {packagesImages.map((packagessImagess) => (
                              <>
                                {packages && packages.id ? (
                                  packagessImagess.package_id == packages.id ? (
                                    <SwiperSlide>
                                      <img
                                        src={`https://www.elagamy-eg.com/uploads/packageImages/${packagessImagess.img}`}
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
                        {packagessDetail.map((packagessDetaill) => (
                          <>
                            {packages && packages.id ? (
                              packagessDetaill.package_id == packages.id ? (
                                <div
                                  className="ssecblog wow slideInRight"
                                  data-wow-duration="2s"
                                >
                                  <h3>
                                    {t("dir") == "ltr"
                                      ? packagessDetaill.title_en
                                      : packagessDetaill.title_ar}
                                  </h3>
                                  <p>
                                    {t("dir") == "ltr"
                                      ? packagessDetaill.description_en
                                      : packagessDetaill.description_ar}
                                  </p>
                                  <h5>{t("Meals")} : </h5>
                                  <p>
                                    {" "}
                                    {t("dir") == "ltr"
                                      ? packagessDetaill.meals_en
                                      : packagessDetaill.meals_ar}
                                  </p>
                                  <h5>{t("Visits")} : </h5>

                                  <p>
                                    {" "}
                                    {t("dir") == "ltr"
                                      ? packagessDetaill.visits_en
                                      : packagessDetaill.visits_ar}
                                  </p>
                                </div>
                              ) : (
                                ""
                              )
                            ) : (
                              ""
                            )}
                          </>
                        ))}
                        <div
                          className="ssecblog wow slideInRight"
                          data-wow-duration="2s"
                        >
                          <h3>{t("Included")}</h3>
                          <p>
                            {packages && packages.included_en
                              ? t("dir") == "ltr"
                                ? packages.included_en
                                : packages.included_ar
                              : null}
                          </p>
                          <div>
                            {packageIncluded.map((packageIncludedd) => (
                              <>
                                {packages && packages.id ? (
                                  packageIncludedd.package_id == packages.id ? (
                                    <div className="d-flex align-items-baseline w-100">
                                      <input
                                        type="checkbox"
                                        name=""
                                        onChange={handleCheckboxChange}
                                        value={packageIncludedd.id}
                                      />
                                      <p className="d-flex align-items-baseline justify-content-between w-100">
                                        <label>
                                          {t("dir") == "ltr"
                                            ? packageIncludedd.title_en
                                            : packageIncludedd.title_ar}
                                        </label>
                                        <label>
                                          $ {packageIncludedd.price}
                                        </label>
                                      </p>
                                    </div>
                                  ) : (
                                    ""
                                  )
                                ) : (
                                  ""
                                )}
                              </>
                            ))}
                          </div>
                        </div>
                        <div
                          className="ssecblog wow slideInRight"
                          data-wow-duration="2s"
                        >
                          <h3>{t("Excluded")}</h3>
                          <p>
                            {packages && packages.excluded_en
                              ? t("dir") == "ltr"
                                ? packages.excluded_en
                                : packages.excluded_ar
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
                    {t("FROM")} $
                    {packages && packages.price
                      ? Number(packages.price) + Number(totalPrice)
                      : null}
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
                      placeholder={t("John1")}
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
                <h3>{t("Releventpackages")}</h3>
                {packagess
                  ? packagess.slice(0, 4).map((packagee) => (
                      <>
                        {packagee.id != packages.id ? (
                          <Link to={`/packages/${packagee.id}`}>
                            <div className="imgblogg">
                              <img
                                src={`https://www.elagamy-eg.com/uploads/packages/${packagee.img}`}
                                alt=""
                              />
                              <div>
                                <p>
                                  {t("FROM")} ${packagee.price}
                                </p>
                                <h5>
                                  {t("dir") == "ltr"
                                    ? packagee.title_en
                                    : packagee.title_ar}
                                </h5>
                              </div>
                            </div>
                          </Link>
                        ) : (
                          ""
                        )}
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
export default PackageDetail;
