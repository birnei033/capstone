<div class="md-modal md-effect-1" id="set-mul-choice">
    <div class="md-content">
        <div class="card p-0">
            <div class="card-header">
                <h4>Multiple Choice</h4>
            </div>
            <div class="card-block">
            <form method="post">
                <div class="form-group form-default">
                    <label for="ex-mc-question">Question</label>
                    <!-- <div id="ex-mc-question" contenteditable="true"></div> -->
                    <hr>
                    <textarea contenteditable="true" class="form-control" rows="3" name="ex-mc-question" id="ex-mc-question"></textarea>
                </div>
                <div class="form-group">
                    <label for="ex-mc-correct-anwser">Correct Answer</label>
                    <input id="ex-mc-correct-anwser" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label for="ex-mc-wrong1">Wrong Answers</label>
                    <input id="ex-mc-wrong1" class="form-control m-b-1" type="text">
                    <input id="ex-mc-wrong2" class="form-control" type="text">
                    <input id="ex-mc-wrong3" class="form-control" type="text">
                </div>
                <div class="btns text-right">
                    <button id="ex-mul-choice-submit" class="btn btn-primary" type="button">Insert</button>
                    <button type="button" class="btn btn-danger waves-effect md-close">Close</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
