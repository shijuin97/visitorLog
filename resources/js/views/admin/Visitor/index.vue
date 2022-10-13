<template>
  <master-layout>
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Visitor Section</h1>
      <p class="mb-4">
        This section use for admin to key in the visitor details.
      </p>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="float-left">
            <h6 class="m-0 font-weight-bold text-primary">All Visitors</h6>
            <div class="mb-1 mt-2">
            <button @click="getAllVisitors('All')" class="btn btn-danger">
              All
            </button>
            <button @click="getAllVisitors('3 Months')" class="btn btn-success">
              Past 3 Months
            </button>
          </div>
          </div>
          
          <div class="float-right">
            <button
              class="btn btn-primary btn-block"
              @click="addVisitor"
              >Add Visitor</button
            >
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive" v-if="visitors.length > 0">
            <table
              class="table table-bordered"
              id="visitor-data-table"
              width="100%"
              cellspacing="0"
            >
              <thead class="sticky-header">
                <tr>
                  <th>No</th>
                  <th>Unit Visiting</th>
                  <th>Event Name</th>
                  <th>Visitor Name</th>
                  <th>Contact Number</th>
                  <th>NRIC</th>
                  <th>Entry</th>
                  <th>Exit</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>

              </tbody>
            </table>
          </div>
          <div v-if="visitors.length <= 0">
            <h3>No data to show...</h3>
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
      visitors: [
        {
          block: "",
          unit_number: "",
          occupant_name: "",
          contact_number: "",
        },
      ],
      status: "All",
    };
  },
  methods: {
    getAllVisitors: function (status) {
      if (this.dataTable) {
        this.dataTable.clear();
        this.dataTable.destroy();
      }
      axios
        .get("/api/getAllVisitors/" + status)
        .then((response) => {
          let self = this;
          this.visitors = response.data;
          this.status = status;
          this.dataTable = $("#visitor-data-table").DataTable({
          });

          this.initdataTable(this.visitors);
        })
        .catch((error) => {
          alert(error);
        });
    },

    initdataTable(visitors) {
      visitors.forEach((index, no) => {
        this.dataTable.row
          .add([
            no + 1,
            index.unit_visit,
            index.event_name,
            index.visitor_name,
            index.contact_number,
            index.nric.slice(-3),
            index.entry,
            index.exit,
            (index.isExit == 0 || index.isEvent == 0) ? `
              <a
                class="btn btn-danger"
                href="/api/checkOutById/${index.id}"
                >Check Out</a
              >` : '',
          ])
          .draw();
      });
    },

    addVisitor(){
        var count = 0;
        this.visitors.forEach((index, no) => {
            if(index.isExit === 0){
                count++;
            }
        });
        if(count < 8){
            this.$router.push({ name: "admin-create-visitor" });
        } else {
            alert("Unit already maximum up to 8 visitors!");
        }
        console.log(count);
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
    this.getAllVisitors(this.status);
  },
};
</script>
