// i18n.js
import i18n from "i18next";
import { initReactI18next } from "react-i18next";

const resources = {
  en: {
    translation: {
      dir: "ltr",
      Home: "Home",
      About: "About US",
      contact: "Contact US",
      tours: "Tours",
      Destination: "Destination",
      Packages: "Packages",
      Team: "Team",
      Transportation: "Transportation",
      Blog: "Blog",
      CallNow: "Call Now",
      title: "Enhancing Your Tour Experience",
      description:
        "Let's make your tour more memorable and precious with our agency",
      message: "with some good vibes.",
      DiscoverMore: "Discover More",
      description2: "City Lights and Urban.",
      message2:
        "Let's make your tour more memorable and precious with our  agency with some good vibes.",
      description3: "History Comes Alive.",
      message3:
        "Let's make your tour more memorable and precious with our  agency with some good vibes.",
      TRAVELCATEGORY: "TRAVEL CATEGORY",
      PopularTours: "Our Popular Tours Type",
      Adventure: "Adventure",
      CityTour: "City Tour",
      CruisesTour: "Cruises Tour",
      SeaTour: "Sea Tour",
      Travel: "Travel",
      Wedding: "Wedding",
      ElAgamyTours: "ElAgamy Amazing Tours!",
      ElAgamyDestinations: "ElAgamy Destinations!",
      AllDestinations: "All Destinations",
      VIBE: "FEEL THE VIBE",
      LifeBegins: "Life Begins at The End of Your",
      Comfort: "Comfort Zone.",
      invit:
        "invitation to embrace the energy, enthusiasm, and positivity that surrounds every moment. It beckons you to immerse yourself in the pulsating rhythm of life, to resonate with the vibrant beats of experiences waiting to be discovered.",
      Destinations: "Destinations",
      FeelFree: "Feel Free To Ask",
      Name: "Full Name",
      Email: "Your Email",
      Send: "Send Now",
      CHOOSE: "CHOOSE YOUR TOUR",
      BestPackages: "Get The Best Packages For Your’s",
      CATEGORY: "TRAVEL CATEGORY",
      PopularTours: "Our Popular Tours",
      AwesomeTour: "Awesome Tour",
      StunningPlaces: "Stunning Places",
      Customer: "Satisfied Customer",
      Guides: "Travel Guides",
      EXPLORE: "EXPLORE NOW",
      Messagehere: "Write your Message here...",
      FROM: "From",
      Included: "Included Package Facility:",
      Experiment: "Your Experiment",
      ensuring: "Feel Free To Express",
      Links: "Links",
      Address: "Address",
      Phone: "Phone",
      Emailc: "Email",
      Join: "Join US",
      WhatDo: "What We do",
      curate:
        "we curate unforgettable travel experiences, offering a blend of discovery, comfort, and excitement",
      contacthere: "Contact Here",
      Get: "Get the best plans for Your’s",
      CHOOSEPACKAGE: "CHOOSE YOUR PACKAGE",
      Get2: "Get The Best Packages For Your’s",
      MeetTeam: "Meet Our Team",
      TOURGUIDE: "TOUR GUIDE’S",
      MeetExcellent: "Meet Our Excellent Guide’s ",
      AmazingDeal: "Amazing Deals",
      RecentPosts: "Recent Posts",
      OurTransportation: "Our Transportation",
      Transportations: "Transportations",
      travelagency: "We are best tour & travel agency in the Egypt.",
      aboutdesc:
        "Welcome to the gateway of wonders, where the sands of time reveal the tales of an ancient civilization. As your dedicated travel companion, our tourism company in Egypt invites you to traverse the legendary landscapes that echo with the whispers of pharaohs and the mysteries of millennia. Immerse yourself in the vibrant tapestry of Egyptian culture, where each step unfolds a story of grandeur and innovation. From the iconic pyramids to the tranquil banks of the Nile, we curate journeys that seamlessly blend historical marvels with contemporary charm.  ",
      aboutdesc2: "rafting transformative travel experiences.",
      aboutdesc3: "guide you through Egypt's wonders .",
      aboutdescbutn: "Find Tours",
      Itinerary: "Itinerary",
      Included: "Included",
      Excluded: "Excluded",
      perPerson: "per Person",
      Name1: "Name",
      Email1: "Email",
      Phone1: "Phone",
      BookingDate1: "Booking Date",
      NumberofAdults: "Number of Adults",
      PromoCode1: "Promo Code",
      SpecialRequests: "Special Requests",
      ReleventTours: "Relevent Tours",
      John: "John",
      Persons: "2 Persons",
      Docode: "Do you have a promo code",
      Writeinquiry: "Write your inquiry",
      InquireNow: "Inquire Now",
      AmazingDeals: "AmazingDeals",
      Meals: "Meals",
      Visits: "Visits",
      Releventpackages: "Relevent Packages",
      ContactUs: "Contact Us",
      Lettogether: "Let’s have a talk together",
      ElAgamyAgency: "ElAgamy Travel Agency",
      Location: "Location",
      Call: "Call Us!",
      ContactFORM: "Contact FORM",
      Lettouch: "Let’s Get in Touch",
      YourName: "Your Name",
      TypeSubject: "Type Your Subject",
      YourEmail: "Your Email",
      YourPhone: "Your Phone",
      YourMessage: "Your Message",
      SendNow: "Send Now",
      FindNow: "Find Now",
      TravelType: "Travel Type",
      SelectMonth: "Select Month",
      Whereto: "Where to",
      aboutsec3div1: "Best Rate Gurantee",
      aboutsec3div2: "Best Rate Guarantee, Unmatched prices, assured.",
      aboutsec3div3: "Offer for Frist Booking",
      aboutsec3div4: "Exclusive offer on your first booking – seize it now!",
      aboutsec3div5: "Various Adventures",
      aboutsec3div6: "Explore diverse adventures tailored just for you.",
      aboutsec3div7: "Supported 24/7",
      aboutsec3div8:
        "Enjoy 24/7 support for a seamless travel experience. Your adventure, our commitment.",

      January: "January",
      February: "February",
      March: "March",
      April: "April",
      May: "May",
      June: "June",
      July: "July",
      August: "August",
      September: "September",
      October: "October",
      November: "November",
      December: "December",
      AdressDesc:"Luxor, first Salah El Din Square, Agami Street"
    },
  },
  es: {
    translation: {
      dir: "rtl",
      Home: "الصفحه الرئيسيه",
      About: "الشركه",
      contact: "للتواصل",
      tours: "الرحلات",
      Destination: "الوجهات",
      Packages: "الباقات",
      Team: "فريقنا المتميز",
      Transportation: "وسائل النقل",
      Blog: "المدونه",
      CallNow: "اتصل الان",
      title: "جعل جولتك أكثر تذكرًا وقيمة مع وكالتنا",
      description: "لنجعل جولتك أكثر تذكرًا وقيمة مع وكالتنا",
      message: "ببعض الطاقة الإيجابية",
      DiscoverMore: "اكتشف اكثر",
      description2: "أضواء المدينة والحياة الحضرية",
      message2:
        "لنجعل جولتك أكثر تذكرًا وقيمة مع وكالتنا وبعض الطاقة الإيجابية",
      description3: "يتحقق التاريخ",
      message3:
        "لنجعل جولتك أكثر تذكرًا وقيمة مع وكالتنا وبعض الطاقة الإيجابية",
      TRAVELCATEGORY: "فئة السفر",
      PopularTours: " جولاتنا الشهيرة",
      Adventure: "مغامرة",
      CityTour: "جولة في المدينة",
      CruisesTour: "جولة بحرية",
      SeaTour: "جولة بحرية",
      Travel: "السفر",
      Wedding: "حفل زفاف",
      ElAgamyTours: "!جولات العجمي المذهلة",
      ElAgamyDestinations: "!وجهات العجمي",
      AllDestinations: "جميع الوجهات",
      VIBE: "اترك لك الإحساس بالنشاط",
      LifeBegins: "الحياة تبدأ عند نهاية",
      Comfort: "منطقة الراحة",
      invit:
        "دعوة لاحتضان الطاقة والحماس والإيجابية التي تحيط بكل لحظة. إنها تطلب منك أن تنغمس في إيقاع حياة متناغم، أن تتناغم مع إيقاع اللحظات الملونة التي تنتظر الاكتشاف. ",
      Destinations: "الوجهات",
      FeelFree: "لا تتردد في السؤال",
      Name: "الاسم الكامل",
      Email: "بريدك الإلكتروني",
      Send: "أرسل الآن",
      CHOOSE: "اختر جولتك",
      BestPackages: "احصل على أفضل الحزم لك",
      CATEGORY: "فئات السفر",
      PopularTours: " جولاتنا الشهيرة",
      AwesomeTour: "جولة رائعة",
      StunningPlaces: "أماكن رائعة",
      Customer: "عميل راضٍ",
      Guides: "مرشدي السفر",
      Messagehere: "...اكتب رسالتك هنا ",
      FROM: "من",
      Included: " في الباقة:",
      Experiment: "تجربتك",
      ensuring: "لا تترد فى التعبير",
      Links: "روابط",
      Address: "العنوان",
      Phone: "الهاتف",
      Emailc: "البريد الإلكتروني",
      Join: "انضم إلينا",
      WhatDo: "ما نقوم به",
      curate:
        "نحن نقوم بتنسيق تجارب السفر لا تُنسى، نقدم مزيجًا من الاكتشاف، والراحة، والإثارة",
      contacthere: "تواصل هنا",
      EXPLORE: "استكشف الان",
      Get: "احصل على أفضل الخطط لك",
      CHOOSEPACKAGE: "اختر باقتك",
      Get2: "احصل على أفضل الحزم لك",
      MeetTeam: "تعرف على فريقنا",
      TOURGUIDE: "مرشدي الجولات",
      MeetExcellent: "تعرف على مرشدينا الممتازين",
      AmazingDeal: "صفقات رائعة",
      RecentPosts: "المنشورات الأخيرة",
      OurTransportation: "وسائل النقل لدينا",
      Transportations: "وسائل النقل",
      travelagency: "نحن أفضل وكالة سفر وسياحة في مصر",

      aboutdesc:
        "مرحبًا بك في بوابة العجائب، حيث تكشف رمال الزمن عن قصص حضارة قديمة. كرفيق سفرك المخلص، تدعوك شركتنا السياحية في مصر إلى استكشاف المناظر الأسطورية التي تتردد فيها همسات الفراعنة وأسرار الآف السنين. انغمس في نسيج ثقافة مصر الحيوي، حيث يكشف كل خطوة عن قصة عظمة وابتكار. من الأهرامات الرمزية إلى الضفاف الهادئة لنهر النيل، نقدم رحلات مصممة بعناية تمزج بسلاسة بين عجائب التاريخ وسحر الحاضر",

      aboutdesc2: "صياغة تجارب سفر محورة نحو التحول",

      aboutdesc3: "يتشرف فريقنا بمرافقتك خلال عجائب مصر",

      aboutdescbutn: "ابحث عن الرحلات",
      Itinerary: "مسار الرحله",
      Included: "المتضمنات",
      Excluded: "المستبعدات",
      perPerson: "للفرد الواحد",
      Name: "الاسم",
      Email: "البريد الإلكتروني",
      Phone: "الهاتف",
      BookingDate: "تاريخ الحجز",
      NumberofAdults: "عدد البالغين",
      PromoCode: "رمز الترويج",
      SpecialRequests: "طلبات خاصة",
      ReleventTours: "الرحلات ذات الصلة",
      John: "جون",
      Persons: "شخصين",
      Docode: "هل لديك برومو كود",
      Writeinquiry: "اكتب استفسارك",
      InquireNow: "استعلم الآن",
      AmazingDeals: "عروض مذهلة",
      Releventpackages: "باقات ذات صله",
      ContactUs: "اتصل بنا",
      Lettogether: "لنتحدث معًا",
      ElAgamyAgency: "العجمى  للسفر والسياحه",
      Location: "الموقع",
      Call: "اتصل بنا!",
      ContactFORM: "نموذج الاتصال",
      Lettouch: "لنتواصل",
      YourName: "اسمك",
      TypeSubject: " الموضوع",
      YourEmail: "بريدك الإلكتروني",
      YourPhone: "هاتفك",
      YourMessage: "رسالتك",
      SendNow: "أرسل الآن",
      FindNow: "ابحث الآن",
      TravelType: "نوع السفر",
      SelectMonth: "اختر الشهر",
      Whereto: "إلى أين",
      aboutsec3div1: "أفضل ضمان للأسعار",
      aboutsec3div2: "أفضل ضمان للأسعار: أسعار لا تضاهى، مضمونة",
      aboutsec3div3: "عرض للحجز الأول",
      aboutsec3div4: "!عرض حصري على حجزك الأول - استفيد منه الآن",
      aboutsec3div5: "مغامرات متنوعة",
      aboutsec3div6: "استكشف مغامرات متنوعة مصممة خصيصًا لك",
      aboutsec3div7: "الدعم على مدار الساعة",
      aboutsec3div8:
        "استمتع بالدعم على مدار الساعة لتجربة سفر سلسة. مغامرتك، التزامنا",
      January: "يناير",
      February: "فبراير",
      March: "مارس",
      April: "إبريل",
      May: "مايو",
      June: "يونيو",
      July: "يوليو",
      August: "أغسطس",
      September: "سبتمبر",
      October: "أكتوبر",
      November: "نوفمبر",
      December: "ديسمبر",
      AdressDesc:"الاقصر اول  ميدان صلاح الدين  شارع  العجمي"
    },
  },
  // Add more languages as needed
};

i18n.use(initReactI18next).init({
  resources,
  lng: "en", // Default language
  fallbackLng: "en",
  interpolation: {
    escapeValue: false,
  },
});

export default i18n;
