<template>
  <master-layout>
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Unit Section</h1>
      <p class="mb-4">
        This section use for admin to key in the unit details.
      </p>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="float-left">
            <h6 class="m-0 font-weight-bold text-primary">All Units</h6>
          </div>
          <div class="float-right">
            <router-link
              class="btn btn-primary btn-block"
              :to="{ name: 'admin-create-unit' }"
              >Add Unit</router-link
            >
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive" v-if="units.length > 0">
            <table
              class="table table-bordered"
              id="unit-data-table"
              width="100%"
              cellspacing="0"
            >
              <thead class="sticky-header">
                <tr>
                  <th>No</th>
                  <th>Block</th>
                  <th>Unit Number</th>
                  <th>Occupant Name</th>
                  <th>Contact Number</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>

              </tbody>
            </table>
          </div>
          <div v-if="units.length <= 0">
            <h3>No data to show...</h3>
          </div>
        </div>
      </div>
      <!-- The Modal -->
      <div class="modal" id="myModalItem">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Single Unit</h4>
              <button type="button" class="close" data-dismiss="modal">
                &times;
              </button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <div class="form-group mt-2">
                <div>
                  <div class="border">
                    <label for="sku">Address: </label>
                    {{ unitDetails.block + "," + unitDetails.unit_number }} <br />
                    <label for="name">Occupant Name: </label>
                    {{ unitDetails.occupant_name }} <br />
                    <label for="name">Contact Number: </label>
                    {{ unitDetails.contact_number
                    }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
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
      dataTable: "",
      units: [
        {
          block: "",
          unit_number: "",
          occupant_name: "",
          contact_number: "",
        },
      ],
      unitDetails: "",
    };
  },
  methods: {
    getAllUnits: function () {
      axios
        .get("/api/getAllUnits")
        .then((response) => {
          let self = this;
          this.units = response.data;
          console.log(this.units);
          this.dataTable = $("#unit-data-table").DataTable({
          });

          this.initdataTable(this.units);
        })
        .catch((error) => {
          alert(error);
        });
    },

    initdataTable(units) {
      units.forEach((index, no) => {
        this.dataTable.row
          .add([
            no + 1,
            index.block,
            index.unit_number,
            index.occupant_name,
            index.contact_number,
            ` <button
                class="btn btn-info"
                data-toggle="modal"
                data-target="#myModalItem"
                data-id=${index.id}
              >
                <i class="fas fa-eye"></i>
              </button>
              <a
              class="btn btn-success"
              href="/admin/edit-unit?id=${index.id}"
              ><i class="fas fa-pencil-alt"></i></a>
              <a
                class="btn btn-danger"
                href="/api/deleteUnitById/${index.id}"
                ><i class="fas fa-trash-alt"></i></a
              >`,
          ])
          .draw();
      });
    },

    censoringWord(word) {
      if (!word) {
        return;
      }
      if (word.length >= 30) {
        return word.substring(0, 30) + "...";
      } else {
        return word;
      }
    },

    getDate() {
      var date = new Date();

      var options = {
        weekday: "short",
        year: "numeric",
        month: "2-digit",
        day: "numeric",
      };
      var realdate = date.toLocaleDateString("en-MY", options);
      return realdate;
    },
    formatAMPM() {
      var date = new Date();
      var hours = date.getHours();
      var minutes = date.getMinutes();
      var ampm = hours >= 12 ? "pm" : "am";
      hours = hours % 12;
      hours = hours ? hours : 12; // the hour '0' should be '12'
      minutes = minutes < 10 ? "0" + minutes : minutes;
      var strTime = hours + "-" + minutes + " " + ampm;
      return strTime;
    },
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
  updated(){
    let self = this;
    $("#myModalItem").on("show.bs.modal", function (e) {
      var triggerLink = $(e.relatedTarget);
      var id = triggerLink.data("id");
      self.units.forEach((item) => {
        if (item.id === id) {
          self.unitDetails = item;
        }
      });
    });
  },
};
</script>
