<template>
  <div>
    <div class="h-full pb-4">
      <!-- <Nav /> -->
    </div>
    <section class="vh-100 bg-img">
      <div class="container h-100 d-flex justify-content-center align-items-center">
        <div class="col col-xl-5">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-12 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
                  <p v-if="loginMessage" style="color: red;">{{ loginMessage }}</p>
                  <form @submit.prevent="handleSubmit">
                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;" />
                      <span class="h2 fw-bold mb-0">Welcome back 👋</span>
                    </div>
                    <h3 class="fw-normal mb-3 pb-3 sign-into" style="letter-spacing: 1px;">
                      Login into your Account
                    </h3>
                    <div class="form-outline mb-4">
                      <label class="form-label mail" for="email">Email</label>
                      <input
                        type="email"
                        id="email"
                        class="form-control form-control-lg"
                        v-model="email"
                      />
                      <p v-if="errors.email" style="color: red;">{{ errors.email }}</p>
                    </div>
                    <div class="form-outline mb-4 pass">
                      <label class="form-label" for="password">Password</label>
                      <div class="input-group">
                        <input
                          :type="showPassword ? 'text' : 'password'"
                          id="password"
                          class="form-control form-control-lg"
                          v-model="password"
                        />
                        <button
                          type="button"
                          class="btn btn-outline-secondary"
                          @click="togglePassword"
                          style="border-top-left-radius: 0; border-bottom-left-radius: 0; padding: 0.5rem;"
                        >
                          <component :is="showPassword ? 'EyeOffIcon' : 'EyeIcon'" size="20" class="me-2" />
                        </button>
                      </div>
                      <p v-if="errors.password" style="color: red;">{{ errors.password }}</p>
                    </div>
                    <div class="d-flex justify-content-center mt-4 mb-4">

                      <Loading v-if="loading" />

                    </div>
                    <div class="pt-1 mb-4 d-flex justify-content-center">
                      <button
                        class="btn btn-dark btn-lg btn-block submit-button submit-btn"
                        type="submit"
                      >
                        Login
                      </button>
                    </div>
                    <a class="small text-muted" href="#!">Forgot password?</a>
                    <p class="mb-5 pb-lg-2" style="color: #393f81;">
                      Don't have an account?
                      <router-link to="/register" style="color: #393f81; margin-left: 10px;">
                        Register Now
                      </router-link>
                    </p>
                    <a href="#!" class="small text-muted">Terms of use.</a>
                    <a href="#!" class="small text-muted">Privacy policy</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer class="bg-light text-center text-lg-start">
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2024 - till date Copyright:
        <a class="text-dark" href="https://github.com/bolaji2274/">@ Bolaji Dev</a>
      </div>
    </footer>
  </div>
</template>

<script>
import { ref, reactive, onMounted } from 'vue';
import { useRouter, useRoute } from 'vue-router';
// import Nav from '../components/Nav.vue';
// import Loading from '../components/Loading.vue';
import { Eye, EyeOff } from 'lucide-vue-next';

export default {
  components: {
    // Nav,
    // Loading,
    EyeIcon: Eye,
    EyeOffIcon: EyeOff,
  },
  setup() {
    const router = useRouter();
    const route = useRoute();

    const email = ref('');
    const password = ref('');
    const showPassword = ref(false);
    const loading = ref(false);
    const errors = reactive({});
    const loginMessage = route.query.message || '';

    const authTokens = ref(null); // Replace this with proper auth state management

    const togglePassword = () => {
      showPassword.value = !showPassword.value;
    };

    const handleSubmit = async () => {
      loading.value = true;
      clearErrors();

      if (email.value.length > 0) {
        try {
          const errorResponse = await loginUser(email.value, password.value);
          if (errorResponse) {
            Object.keys(errorResponse).forEach((key) => {
              errors[key] = errorResponse[key];
            });
          }
        } catch (error) {
          console.error('Login failed', error);
        } finally {
          loading.value = false;
        }
      }
    };

    const clearErrors = () => {
      Object.keys(errors).forEach((key) => (errors[key] = ''));
    };

    const loginUser = async (email, password) => {
      // Mock function - Replace with actual API call
      return null;
    };

    onMounted(() => {
      if (authTokens.value) {
        router.push('/');
      }
    });

    return {
      email,
      password,
      showPassword,
      loading,
      errors,
      loginMessage,
      togglePassword,
      handleSubmit,
    };
  },
};
</script>

<style scoped>
/* Add relevant styles here */
.sign-into{
    font-family: "Raleway", sans-serif;
    font-weight: 700;
    font-optical-sizing: auto;
    font-style: normal;
    font-size: 24px;
    color: #444444;
    margin: 0 0 30px 0;
}
.bg-img {
    background-image: url('../assets/images/chicken-3.jpg');
    object-fit: cover;
}
.mail, .pass {
    font-family: "Raleway", sans-serif;
    font-weight: 700;
    font-style: normal;
    color: #555;
    cursor: pointer;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 10px;
}

.submit-buton {
    display: inline-block;
    position: relative;
    cursor: pointer;
    outline: none;
    white-space: nowrap;
    margin: 5px 5px;
    padding: 22px 22px;
    font-size: 14px;
    height: 40px;
    line-height: 40px;
    background-color: #009933;
    color: #FFF;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    border: none;
    text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
}
.submit-btn{
    font-family: "Raleway", sans-serif;
    font-weight: 700;
    font-style: normal;
    color: #555;
    cursor: pointer;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 10px;
}
</style>
