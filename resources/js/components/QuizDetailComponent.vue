<template>
    <div class="component">
        <div class="quiz-detail">
            <h2 class="text-center mb-4 mt-4">Quetion No.**</h2>

            <img class="quiz-mv mb-4" src="http://placehold.it/640x340/27709b/ffffff?text=Quiz+Main+Image" alt="quiz-mail-img">

            <p class="quiz-text text-center mb-4">問題：テキストテキストテキストテキストテキストテキスト</p>

            <div class="quiz-choices-list mb-4">
                <div>
                    <p>選択肢1</p>
                </div>

                <div>
                    <p>選択肢2</p>
                </div>

                <div>
                    <p>選択肢3</p>
                </div>

                <div>
                    <p>選択肢4</p>
                </div>
            </div>

            <div class="quiz-answer">
                <p>答え</p>
                <p>正解は**************</p>
                <p>
                    解説:<br>
                    ***************<br>
                    ***************<br>
                    ***************<br>
                </p>
            </div>

        </div>

    </div>
</template>

<script>
    export default {
        props: {
            taskId: String
        },
        data: function () {
            return {
                task: {}
            }
        },
        methods: {
            getTask() {
                axios.get('/api/tasks/' + this.taskId)
                    .then((res) => {
                        this.task = res.data;
                    });
            }
        },
        mounted() {
            this.getTask();
        }
    }
</script>