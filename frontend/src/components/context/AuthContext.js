import { reactive, readonly, computed, provide, inject } from "vue";
import { useRouter } from "vue-router";
import Swal from "sweetalert2";

export const AuthContextSymbol = Symbol("AuthContext");

export function useAuthProvider() {
  const router = useRouter();

  const state = reactive({
    authTokens: JSON.parse(localStorage.getItem("authTokens")) || null,
    user: JSON.parse(localStorage.getItem("authTokens"))
      ? jwtDecode(localStorage.getItem("authTokens"))
      : null,
    errors: {},
  });

  const loginUser = async (email, password) => {
    try {
      const response = await fetch("https://api-bkrt.onrender.com/api/token/", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ email, password }),
      });

      const data = await response.json();

      if (response.ok) {
        state.authTokens = data;
        state.user = jwtDecode(data.access);
        localStorage.setItem("authTokens", JSON.stringify(data));
        state.errors = {}; // Clear errors
        if (state.user.is_admin) {
          router.push("/admin/dashboard");
        } else {
          router.push("/customer/dashboard");
        }
        Swal.fire({
          title: "Login Successful!",
          icon: "success",
          toast: true,
          timer: 3000,
          position: "top-right",
        });
      } else {
        state.errors = data; // Capture field-specific errors
        Swal.fire({
          title: "Login Failed!",
          text: data.detail || "Invalid credentials.",
          icon: "error",
          toast: true,
          timer: 3000,
          position: "top-right",
        });
      }
    } catch (error) {
      console.error("Login error:", error);
      Swal.fire({
        title: "Login Error!",
        text: "An error occurred. Please try again.",
        icon: "error",
        toast: true,
        timer: 3000,
        position: "top-right",
      });
    }
  };

  const registerUser = async (details) => {
    try {
      const response = await fetch("https://api-bkrt.onrender.com/api/register/", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(details),
      });

      const data = await response.json();

      if (response.ok) {
        state.errors = {};
        router.push("/login");
        Swal.fire({
          title: "Registration Successful!",
          text: "Check your email to verify your account.",
          icon: "success",
          toast: true,
          timer: 3000,
          position: "top-right",
        });
      } else {
        state.errors = data;
        Swal.fire({
          title: "Registration Failed!",
          text: "Please check the form for errors.",
          icon: "error",
          toast: true,
          timer: 3000,
          position: "top-right",
        });
      }
    } catch (error) {
      console.error("Registration error:", error);
      Swal.fire({
        title: "Registration Error!",
        text: "An error occurred. Please try again.",
        icon: "error",
        toast: true,
        timer: 3000,
        position: "top-right",
      });
    }
  };

  const logoutUser = () => {
    state.authTokens = null;
    state.user = null;
    localStorage.removeItem("authTokens");
    router.push("/login");
    Swal.fire({
      title: "Logged Out!",
      icon: "success",
      toast: true,
      timer: 3000,
      position: "bottom-right",
    });
  };

  const clearErrors = () => {
    state.errors = {};
  };

  return {
    authTokens: computed(() => readonly(state.authTokens)),
    user: computed(() => readonly(state.user)),
    errors: computed(() => readonly(state.errors)),
    loginUser,
    registerUser,
    logoutUser,
    clearErrors,
  };
}

export function provideAuthContext() {
  const auth = useAuthProvider();
  provide(AuthContextSymbol, auth);
  return auth;
}

export function useAuthContext() {
  const auth = inject(AuthContextSymbol);
  if (!auth) {
    throw new Error("AuthContext must be provided!");
  }
  return auth;
}
