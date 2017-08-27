$(function() {
    var model = new TaskModel(),
        view = new TaskView(model),
        controller = new TaskContoller(model, view);
});
