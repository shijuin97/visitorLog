<template>
  <div>
    <div id="login-signup" class="container">
      <div class="row p-0 d-flex justify-content-center">
        <div class="col-12 col-lg-7 p-0">
          <div class="frame">
            <div class="form-signin">
              <div class="input-styling">
                <label for="option">Visiting Option</label>
                <select class="form-control" id="option" v-model="option">
                  <option value="unit">Unit</option>
                  <option value="event">Event</option>
                </select>
              </div>
              <div v-if="option">
                <div class="input-styling" v-if="option == 'unit'">
                  <label for="unit_id">Unit</label>
                  <select
                    id="unit_id"
                    class="form-control"
                    v-model="unit_id"
                    required
                  >
                    <option
                      v-for="(_unit, indexUnit) in units"
                      :key="indexUnit"
                      :value="_unit.id"
                    >
                      {{ _unit.block + "," + _unit.unit_number }}
                    </option>
                  </select>
                </div>
                <div class="input-styling" v-if="option == 'event'">
                  <label for="event_name">Event Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="event_name"
                    placeholder="Enter Event Name"
                    name="event_name"
                    v-model="event_name"
                    required
                  />
                </div>
                <div class="input-styling">
                  <label for="visitor_name">Visitor Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="visitor_name"
                    placeholder="Enter Visitor Name"
                    name="visitor_name"
                    v-model="visitor_name"
                    required
                  />
                </div>
                <div class="input-styling">
                  <label>Contact Number</label>
                  <input
                    type="number"
                    class="form-control"
                    id="contact_number"
                    placeholder="Enter Contact Number"
                    name="contact_number"
                    v-model="contact_number"
                    required
                  />
                </div>
                <div class="input-styling">
                  <label for="nric">NRIC</label>
                  <input
                    type="text"
                    class="form-control"
                    id="nric"
                    placeholder="Enter NRIC"
                    name="nric"
                    v-model="nric"
                    required
                  />
                </div>
              </div>
              <div class="input-styling">
                <button type="submit" class="btn-signin" @click="submit()">
                  Submit
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  components: {},
  data() {
    return {
      option: "",
      nric: "",
      visitor_name: "",
      contact_number: "",
      units: "",
      unit_id: "",
    };
  },
  mounted() {},
  created() {
    this.getAllUnits();
  },
  methods: {
    submit() {
      axios.defaults.baseURL = "/api";
      axios
        .post("/visitorRegister", {
          nric: this.nric,
          visitor_name: this.visitor_name,
          contact_number: this.contact_number,
          unit_id: this.unit_id,
          option: this.option,
          event_name: this.event_name,
        })
        .then((response) => {
          this.$alert("Success, You may enter to visit now.").then(() => {
          location.reload();
          });
          
        })
        .catch((error) => {
          console.log(error);
          this.$alert(error.response.data.error);
        });
    },
    getAllUnits() {
      axios
        .get("/api/getAllUnits")
        .then((response) => {
          this.units = response.data;
          console.log(this.units);
        })
        .catch((error) => {});
    },
  },
};
</script>
