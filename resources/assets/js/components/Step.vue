<template>
    <div class="panel-body">
        <form>
            <vue-form-generator :schema="schema" :model="model" :options="formOptions">
            </vue-form-generator>
        </form>
    </div>
</template>
<script>

    import VueFormGenerator from "vue-form-generator";

    Vue.use(VueFormGenerator);

    export default {
        data () {
            return {
                formOptions: {
                    validateAfterLoad: true,
                    validateAfterChanged: true,
                    fieldIdPrefix: 'user-'
                },
                model: {
                    id: 1,
                    name: "John Doe",
                    password: "J0hnD03!x4",
                    skills: ["Javascript", "VueJS"],
                    email: "john.doe@gmail.com",
                    status: true
                },

                schema: {
                    groups: [
                        {
                            legend: "User Details",
                            fields: [
                                {
                                    type: "input",
                                    inputType: "text",
                                    label: "ID (disabled text field)",
                                    model: "id",
                                    readonly: true,
                                    disabled: true
                                },
                                {
                                    type: "input",
                                    inputType: "text",
                                    label: "Name",
                                    model: "name",
                                    id: "user_name",
                                    placeholder: "Your name",
                                    featured: true,
                                    required: true
                                },
                                {
                                    type: "input",
                                    inputType: "email",
                                    label: "E-mail",
                                    model: "email",
                                    placeholder: "User's e-mail address"
                                },
                                {
                                    type: "input",
                                    inputType: "password",
                                    label: "Password",
                                    model: "password",
                                    min: 6,
                                    required: true,
                                    hint: "Minimum 6 characters",
                                    validator: VueFormGenerator.validators.string
                                }
                            ]
                        },
                        {
                            legend: "Skills & Status",
                            fields: [
                                {
                                    type: "select",
                                    label: "skills",
                                    model: "type",
                                    values: ["Javascript", "VueJS", "CSS3", "HTML5"]
                                },
                                {
                                    type: "checkbox",
                                    label: "Status",
                                    model: "status",
                                    default: true
                                }
                            ]
                        }
                    ],


                }
            }
        }
    }
</script>