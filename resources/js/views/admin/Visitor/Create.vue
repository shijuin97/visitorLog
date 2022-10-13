<template>
  <master-layout>
    <div class="card shadow mb-4">
      <!-- Card Header - Accordion -->
      <div
        href="#unitForm"
        class="d-block card-header py-3"
        role="button"
        aria-expanded="true"
        aria-controls="unitForm"
      >
        <h6 class="m-0 font-weight-bold text-primary">Create a Visitor</h6>
      </div>
        <div class="collapse show" id="unitForm">
          <div class="card-body">
            <div class="was-validated">
              <div class="form-group">
                <label for="unit_id">Unit:</label>
                <select
                  id="unit_id"
                  class="form-control d-flex text-sm mr-2"
                  style="width: auto;"
                  v-model="unit_id"
                  required
                >
                  <option
                    v-for="(_unit, indexUnit) in units"
                    :key="indexUnit"
                    :value="_unit.id"
                  >
                    {{ _unit.block + "," + _unit.unit_number}}
                  </option>
                </select>
              </div>
              <div class="form-group">
                <label for="visitor_name">Visitor Name:</label>
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
              <div class="form-group">
                <label>Contact Number:</label>
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
              <div class="form-group">
                <label for="nric">NRIC:</label>
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

          </div>
        </div>
      
      <div class="card-footer" align="center">
        <a class="btn btn-danger mt-2" href="/admin/visitor">Cancel</a>
        <a class="btn btn-primary mt-2" @click="createData">Submit</a>
      </div>
    </div>
  </master-layout>
</template>

<script>

import axios from "axios";
import Master from "../Layout/Master.vue";


export default {
  components: {
    "master-layout": Master,
  },
  data: function () {
    return {
      nric: "",
      visitor_name: "",
      contact_number: "",
      units: "",
      unit_id: "",
    };
  },
  created() {
    if (
      this.$session.get("admin").role !== "super_admin" &&
      this.$session.get("admin").role !== "admin"
    ) {
      alert("You dont have permission to access this");
      location.replace("/admin/login");
    }
    this.getAllUnits();
  },
  methods: {
    createData() {
      let formData = new FormData();
      if(!this.nric || !this.visitor_name || !this.contact_number || !this.unit_id){
          alert("Error : Make sure all required field is filled in");
      } else {
        formData.append("nric", this.nric);
        formData.append("visitor_name", this.visitor_name);
        formData.append("contact_number", this.contact_number);
        formData.append("unit_id", this.unit_id);
        axios
          .post("/api/createVisitor", formData)
          .then((response) => {

            alert("New Visitor Has Been Created");
            this.$router.push({ name: "admin-visitor" });
          })
          .catch((error) => {
            alert(error.response.data.error);
          });
      }

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