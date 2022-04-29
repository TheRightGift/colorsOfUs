<template>
    <div>
        <div
            class="modal fade"
            id="subjectModal"
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
                            v-if="addSubjectView"
                        >
                            Add/Edit Subject
                        </h5>
                        <h5
                            class="modal-title"
                            id="exampleModalLabel"
                            v-else-if="subjectView"
                        >
                            Subject
                        </h5>
                        <h5
                            class="modal-title"
                            id="exampleModalLabel"
                            v-else-if="subjectViewTrashed"
                        >
                            Trashed Subjects
                        </h5>
                        <a
                            href="#!"
                            class="btn btn-light"
                            v-if="subjectView"
                            @click="
                                (addSubjectView = true), (subjectView = false)
                            "
                            >Add Subject</a
                        >
                        <button
                            class="close"
                            type="button"
                            data-dismiss="modal"
                            aria-label="Close"
                            @click="
                                (subjectViewTrashed = false),
                                    (addSubjectView = false),
                                    (subjectView = true),
                                    (update = false),
                                    (subject = {})
                            "
                        >
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="formRole" v-if="addSubjectView || update">
                            <div
                                class="bg-success text-white"
                                v-if="success != ''"
                            >
                                <p>{{ success }}</p>
                            </div>
                            <form @submit.prevent="createSubject">
                                <div class="form-group col-md-12">
                                    <label for="grid-role"> Name </label>
                                    <input
                                        class="form-control"
                                        id="grid-role"
                                        type="text"
                                        placeholder="Name"
                                        v-model="subject.name"
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
                                        v-model="subject.desc"
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
                                        (subjectViewTrashed = false),
                                            (addSubjectView = false),
                                            (subjectView = true),
                                            (update = false),
                                            (subject = {})
                                    "
                                >
                                    Cancel
                                </button>
                            </form>
                        </div>
                        <div class="formTable" v-else-if="subjectView">
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
                                        v-for="(subject, index) in subjects"
                                        :key="subject.id"
                                    >
                                        <th scope="row">{{ index + 1 }}</th>
                                        <td>{{ subject.name }}</td>
                                        <td>{{ subject.desc }}</td>
                                        <td>
                                            <i
                                                class="
                                                    fas
                                                    fa-trash
                                                    cursor-pointer
                                                "
                                                @click="trashSubject(subject)"
                                            ></i>
                                        </td>
                                        <td>
                                            <i
                                                class="
                                                    fas
                                                    fa-edit
                                                    cursor-pointer
                                                "
                                                @click="editSubject(subject)"
                                            ></i>
                                        </td>
                                    </tr>
                                    <tr
                                        v-if="subjects.length == 0"
                                        class="text-center"
                                    >
                                        No Subject Found
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="recycleTable" v-else-if="subjectViewTrashed">
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
                                        v-for="(subject, index) in subjectTrashed"
                                        :key="subject.id"
                                    >
                                        <th scope="row">{{ index + 1 }}</th>
                                        <td>{{ subject.name }}</td>
                                        <td>{{ subject.desc }}</td>
                                        <td>
                                            <i
                                                class="
                                                    fas
                                                    fa-redo
                                                    cursor-pointer
                                                "
                                                @click="refresh(subject)"
                                            ></i>
                                        </td>
                                    </tr>
                                    <tr
                                        v-if="subjectTrashed.length == 0"
                                        class="text-center"
                                    >
                                        No Trashed Subject Found
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            class="btn btn-light"
                            type="button"
                            v-if="subjectView"
                            @click="getTrashed"
                        >
                            View Trashed
                        </button>
                        <button
                            class="btn btn-light"
                            type="button"
                            v-if="subjectViewTrashed"
                            @click="
                                (subjectViewTrashed = false),
                                    (addSubjectView = false),
                                    (subjectView = true),
                                    (subject = {})
                            "
                        >
                            Back To Subjects
                        </button>
                        <button
                            class="btn btn-secondary"
                            type="button"
                            data-dismiss="modal"
                            @click="
                                (subjectViewTrashed = false),
                                    (addSubjectView = false),
                                    (subjectView = true),
                                    (update = false),
                                    (subject = {})
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
        name: "Subject",
        data() {
            return {
                subject: {},
                subjectViewTrashed: false,
                subjects: [],
                subjectView: true,
                addSubjectView: false,
                subjectTrashed: [],
                update: false,
                requesting: false,
                success: "",
            };
        },
        methods: {
            createSubject() {
                let url;
                let axiosFunction;
                if (this.update == true) {
                    url = `api/subject/${this.subject.id}`;
                    axiosFunction = axios.put;
                } else {
                    url = "api/subject";
                    axiosFunction = axios.post;
                }
                this.requesting = true;
                axiosFunction(url, this.subject)
                    .then((res) => {
                        if (res.data.status == 1) {
                            this.success = this.update
                                ? "Update Success"
                                : res.data.message;
                            setTimeout(() => {
                                !this.update
                                    ? this.subjects.push(res.data.subject)
                                    : null;
                                this.addSubjectView = false;
                                this.subject = {};
                                this.subjectView = true;
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
            editSubject(subject) {
                this.addSubjectView = true;
                this.update = true;
                this.subjectViewTrashed = false;
                this.subject = subject;
            },
            getSubjects() {
                axios
                    .get(`api/subject`)
                    .then((res) => {
                        this.subjects = res.data.untrashed;
                        this.subjectTrashed = res.data.trashed;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            getTrashed() {
                this.subjectViewTrashed = true;
                this.subjectView = false;
                this.addSubjectView = false;
                this.update = false;
            },
            refresh(subject) {
                axios
                    .patch(`api/subject/${subject.id}`)
                    .then((res) => {
                        if (res.status == 201) {
                            this.subjects.push(subject);
                            this.subjectTrashed.splice(
                                this.subjectTrashed.findIndex(
                                    (rol) => rol.id === subject.id
                                ),
                                1
                            );
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            trashSubject(subject) {
                axios
                    .delete(`api/subject/${subject.id}`)
                    .then((res) => {
                        if (res.status == 204) {
                            this.subjects.splice(
                                this.subjects.findIndex(
                                    (rol) => rol.id === subject.id
                                ),
                                1
                            );
                            this.subjectTrashed.push(subject);
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
        },
        mounted() {
            this.getSubjects();
        },
    };
</script>