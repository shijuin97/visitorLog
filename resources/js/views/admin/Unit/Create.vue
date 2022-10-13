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
        <h6 class="m-0 font-weight-bold text-primary">Create a Unit</h6>
      </div>
        <div class="collapse show" id="unitForm">
          <div class="card-body">
            <div class="was-validated">
              <div class="form-group">
                <label for="block">Block:</label>
                <input
                  type="text"
                  class="form-control"
                  id="block"
                  placeholder="Enter Block"
                  name="block"
                  v-model="block"
                  required
                />
              </div>
              <div class="form-group">
                <label for="unit_number">Unit Number:</label>
                <input
                  type="text"
                  class="form-control"
                  id="unit_number"
                  placeholder="Enter Unit Number"
                  name="unit_number"
                  v-model="unit_number"
                  required
                />
              </div>
              <div class="form-group">
                <label for="occupant_name">Occupant Name:</label>
                <input
                  type="text"
                  class="form-control"
                  id="occupant_name"
                  placeholder="Enter Occupant Name"
                  name="occupant_name"
                  v-model="occupant_name"
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
            </div>

          </div>
        </div>
      
      <div class="card-footer" align="center">
        <a class="btn btn-danger mt-2" href="/admin/unit">Cancel</a>
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
      block: "",
      unit_number: "",
      occupant_name: "",
      contact_number: "",
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

  },
  methods: {
    createData() {
      let formData = new FormData();
      if(!this.block || !this.unit_number || !this.occupant_name || !this.contact_number){
          alert("Error : Make sure all required field is filled in");
      } else {
        formData.append("block", this.block);
        formData.append("unit_number", this.unit_number);
        formData.append("occupant_name", this.occupant_name);
        formData.append("contact_number", this.contact_number);
        axios
          .post("/api/createUnit", formData)
          .then((response) => {

            alert("New Unit Has Been Created");
            this.$router.push({ name: "admin-unit" });
          })
          .catch((error) => {
            alert(error.response.data.error);
          });
      }

    },
  },
};
</script>