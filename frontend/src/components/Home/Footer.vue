<template>
  <div>
    <section class="info_section">
      <div class="container">
        <div class="info_top">
          <div class="row">
            <div class="col-md-3">
              <router-link to="/" class="navbar-brand">
                Nasradamuff
              </router-link>
            </div>
            <div class="col-md-5">
              <div class="info_contact">
                <a href="">
                  <i class="fa fa-map-marker" aria-hidden="true" />
                  <span>Location</span>
                </a>
                <a href="">
                  <i class="fa fa-phone" aria-hidden="true" />
                  <span>+234 91 55 11 37 97</span>
                </a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="social_box">
                <a href="">
                  <i class="fa fa-facebook" aria-hidden="true" />
                </a>
                <a href="">
                  <i class="fa fa-twitter" aria-hidden="true" />
                </a>
                <a href="">
                  <i class="fa fa-linkedin" aria-hidden="true" />
                </a>
                <a href="">
                  <i class="fa fa-instagram" aria-hidden="true" />
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="info_bottom">
          <div class="row">
            <div class="col-lg-3 col-md-6">
              <div class="info_detail">
                <h5>Company</h5>
                <p>
                  Nasradamuff Farm offers high-quality livestock, including
                  broilers, layers, fish, and other agricultural animals,
                  tailored to meet the specific needs of farmers. Our livestock
                  is raised under optimal conditions, ensuring that farmers
                  receive healthy animals ready for farming. Farmers can apply
                  for livestock directly through our platform, selecting the
                  quantity, type of feed, and required drugs for the animals.
                </p>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="info_form">
                <h5>NEWSLETTER</h5>
                <form @submit.prevent="handleNewsletterSubmit">
                  <input type="email" v-model="email" placeholder="Enter Your Email" required />
                  <button type="submit">Subscribe</button>
                </form>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="info_detail">
                <h5>Services</h5>
                <p>
                  Through our unique profit-sharing model, farmers have access
                  to livestock without the need for immediate capital. We partner
                  with farmers by providing livestock and other essential resources,
                  and in return, we share profits at the end of the farming cycle. This
                  reduces financial risk for the farmers while allowing them to focus
                  on growing their business. The profit-sharing ratio is determined
                  based on factors such as farming experience and the farmer's capacity.
                </p>
              </div>
            </div>
            <div class="col-lg-2 col-md-6">
              <div>
                <h5>Useful links</h5>
                <ul class="info_menu">
                  <li>
                    <router-link to="/">Home</router-link>
                  </li>
                  <li>
                    <router-link to="/#about">About</router-link>
                  </li>
                  <li>
                    <router-link to="/#services">Services</router-link>
                  </li>
                  <li>
                    <router-link to="/#product">Product</router-link>
                  </li>
                  <li class="mb-0">
                    <router-link to="/#contact">Contact Us</router-link>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- footer section -->
    <footer class="footer_section">
      <div class="container">
        <p>
          © <span id="displayYear"></span> All Rights Reserved By
          <a href="https://github.com/bolaji2274/" target="_blank">Bolaji Dev</a>
        </p>
      </div>
    </footer>
    <!-- footer section -->
  </div>
</template>

<script>
export default {
  data() {
    return {
      email: '', // To bind with the email input field
    };
  },
  methods: {
    handleNewsletterSubmit() {
      // Handle newsletter submission logic here
      console.log('Newsletter submitted:', this.email);
      this.email = ''; // Clear the input after submission
    },
  },
  mounted() {
    // Display current year in footer
    document.getElementById('displayYear').textContent = new Date().getFullYear();
  },
};
</script>

<style scoped>
/* You can add custom CSS styling here */
.info_section .info_contact {
    margin: 15px 0;
  }

  .info_section .row>div {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
  }

  .info_section .info_main .rov>div {
    margin-bottom: 25px;
  }

  .info_section .social_box {
    margin-bottom: 25px;
  }


.info_section {
  background-color: #004445;
  color: #ffffff;
  padding: 45px 0 10px 0;
}

.info_section h5 {
  margin-bottom: 20px;
  text-transform: uppercase;
  font-weight: bold;
}

.info_section .info_top {
  margin-bottom: 25px;
}

.info_section .info_top .row {
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
}

.info_section .info_contact {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
      -ms-flex-pack: justify;
          justify-content: space-between;
  min-width: 245px;
}

.info_section .info_contact a {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  color: #ffffff;
}

.info_section .info_contact a i {
  margin-right: 5px;
  font-size: 24px;
}

.info_section .social_box {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: end;
      -ms-flex-pack: end;
          justify-content: flex-end;
}

.info_section .social_box a {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  width: 45px;
  height: 45px;
  border-radius: 5px;
  color: #ffffff;
  margin-right: 5px;
  font-size: 24px;
}

.info_section .info_bottom .row > div {
  margin-bottom: 30px;
}

.info_section .info_menu {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  padding-left: 0;
}

.info_section .info_menu li {
  list-style-type: none;
  margin-bottom: 10px;
}

.info_section .info_menu li a {
  color: #ffffff;
}

.info_section .info_form input {
  width: 100%;
  border: none;
  height: 45px;
  margin-bottom: 25px;
  padding-left: 25px;
  background-color: #eaeaea;
  outline: none;
  color: #101010;
}

.info_section .info_form button {
  display: inline-block;
  padding: 10px 45px;
  background-color: #2c7873;
  color: #ffffff;
  border-radius: 5px;
  -webkit-transition: all .3s;
  transition: all .3s;
  border: 1px solid #2c7873;
}

.info_section .info_form button:hover {
  background-color: transparent;
  color: #2c7873;
}

/* footer section*/
.footer_section {
  position: relative;
  background-color: #ffffff;
  text-align: center;
}

.footer_section p {
  color: #252525;
  padding: 25px 0;
  margin: 0;
}

.footer_section p a {
  color: inherit;
}


</style>
