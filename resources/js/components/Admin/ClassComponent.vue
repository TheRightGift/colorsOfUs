<template>
    <div>
        <div
            class="modal fade"
            id="colorModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5
                            class="modal-title"
                            id="exampleModalLabel"
                            v-if="addColorView"
                        >
                            Add/Edit color
                        </h5>
                        <h5
                            class="modal-title"
                            id="exampleModalLabel"
                            v-else-if="colorView"
                        >
                            Color
                        </h5>
                        <h5
                            class="modal-title"
                            id="exampleModalLabel"
                            v-else-if="colorViewTrashed"
                        >
                            Trashed colors
                        </h5>
                        <a
                            href="#!"
                            class="btn btn-light"
                            v-if="colorView"
                            @click="
                                (addColorView = true), (colorView = false)
                            "
                            >Add Color</a
                        >
                        <button
                            class="close"
                            type="button"
                            data-dismiss="modal"
                            aria-label="Close"
                            @click="
                                (colorViewTrashed = false),
                                    (addColorView = false),
                                    (colorView = true),
                                    (update = false),
                                    (color = {})
                            "
                        >
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="formRole" v-if="addColorView || update">
                            <div
                                class="bg-success text-white"
                                v-if="success != ''"
                            >
                                <p>{{ success }}</p>
                            </div>
                            <form @submit.prevent="createColor">
                                <div class="form-group col-md-12">
                                    <label for="grid-role"> Name </label>
                                    <input
                                        class="form-control"
                                        id="grid-role"
                                        type="text"
                                        placeholder="Name"
                                        v-model="color.name"
                                        required
                                    />
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="grid-role"> Description </label>
                                    <textarea
                                        class="form-control"
                                        id="grid-role"
                                        type="text"
                                        placeholder="Description if any"
                                        v-model="color.desc"
                                    ></textarea>
                                </div>
                                <button class="btn btn-primary" type="submit">
                                    <i
                                        class="fas fa-spinner fa-spin"
                                        v-if="requesting"
                                    ></i>
                                    {{ update ? "Update" : "Submit" }}
                                </button>
                                <button
                                    class="btn btn-secondary"
                                    type="button"
                                    @click="
                                        (colorViewTrashed = false),
                                            (addColorView = false),
                                            (colorView = true),
                                            (update = false),
                                            (color = {})
                                    "
                                >
                                    Cancel
                                </button>
                            </form>
                        </div>
                        <div class="formTable" v-else-if="colorView">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(color, index) in colors"
                                        :key="color.id"
                                    >
                                        <th scope="row">{{ index + 1 }}</th>
                                        <td>{{ color.name }}</td>
                                        <td>{{ color.desc }}</td>
                                        <td>
                                            <i
                                                class="
                                                    fas
                                                    fa-trash
                                                    cursor-pointer
                                                "
                                                @click="trashColor(color)"
                                            ></i>
                                        </td>
                                        <td>
                                            <i
                                                class="
                                                    fas
                                                    fa-edit
                                                    cursor-pointer
                                                "
                                            C   @click="editcolor(color)"
                                            ></i>
                                        </td>
                                    </tr>
                                    <tr
                                        v-if="colors.length == 0"
                                        class="text-center"
                                    >
                                        No color Found
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="recycleTable" v-else-if="colorViewTrashed">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(color, index) in colorTrashed"
                                        :key="color.id"
                                    >
                                        <th scope="row">{{ index + 1 }}</th>
                                        <td>{{ color.name }}</td>
                                        <td>{{ color.desc }}</td>
                                        <td>
                                            <i
                                                class="
                                                    fas
                                                    fa-redo
                                                    cursor-pointer
                                                "
                                                @click="refresh(color)"
                                            ></i>
                                        </td>
                                    </tr>
                                    <tr
                                        v-if="colorTrashed.length == 0"
                                        class="text-center"
                                    >
                                        No Trashed color Found
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            class="btn btn-light"
                            type="button"
                            v-if="colorView"
                            @click="getTrashed"
                        >
                            View Trashed
                        </button>
                        <button
                            class="btn btn-light"
                            type="button"
                            v-if="colorViewTrashed"
                            @click="
                                (colorViewTrashed = false),
                                    (addColorView = false),
                                    (colorView = true),
                                    (color = {})
                            "
                        >
                            Back To colors
                        </button>
                        <button
                            class="btn btn-secondary"
                            type="button"
                            data-dismiss="modal"
                            @click="
                                (colorViewTrashed = false),
                                    (addColorView = false),
                                    (colorView = true),
                                    (update = false),
                                    (color = {})
                            "
                        >
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: "Color",
        data() {
            return {
                color: {},
                colorViewTrashed: false,
                colors: [],
                colorView: true,
                addColorView: false,
                colorTrashed: [],
                update: false,
                requesting: false,
                success: "",
            };
        },
        methods: {
            createColor() {
                let url;
                let axiosFunction;
                if (this.update == true) {
                    url = `api/color/${this.color.id}`;
                    axiosFunction = axios.put;
                } else {
                    url = "api/color";
                    axiosFunction = axios.post;
                }
                this.requesting = true;
                axiosFunction(url, this.color)
                    .then((res) => {
                        if (res.data.status == 1) {
                            this.success = this.update
                                ? "Update Success"
                                : res.data.message;
                            setTimeout(() => {
                                !this.update
                                    ? this.colors.push(res.data.color)
                                    : null;
                                this.addColorView = false;
                                this.colorView = true;
                                this.success = "";
                                this.requesting = false;
                                this.update = false;
                            }, 1000);
                        }
                    })
                    .catch((err) => {
                        this.requesting = false;
                        console.log(err);
                    });
            },
            editColor(color) {
                this.addColorView = true;
                this.update = true;
                this.colorViewTrashed = false;
                this.color = color;
            },
            getColors() {
                axios
                    .get(`api/color`)
                    .then((res) => {
                        this.colors = res.data.untrashed;
                        this.colorTrashed = res.data.trashed;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            getTrashed() {
                this.colorViewTrashed = true;
                this.colorView = false;
                this.addColorView = false;
                this.update = false;
            },
            refresh(color) {
                axios
                    .patch(`api/color/${color.id}`)
                    .then((res) => {
                        if (res.status == 201) {
                            this.colors.push(color);
                            this.colorTrashed.splice(
                                this.colorTrashed.findIndex(
                                    (rol) => rol.id === color.id
                                ),
                                1
                            );
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            trashColor(color) {
                axios
                    .delete(`api/color/${color.id}`)
                    .then((res) => {
                        if (res.status == 204) {
                            this.colors.splice(
                                this.colors.findIndex(
                                    (rol) => rol.id === color.id
                                ),
                                1
                            );
                            this.colorTrashed.push(color);
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
        },
        mounted() {
            this.getColors();
        },
    };
</script>