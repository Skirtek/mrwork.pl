function filterme() {
  otable = $('#example').dataTable();
  //build a regex filter string with an or(|) condition
  var types = $('#type:checked').map(function() {
    return this.value;
  }).get().join(' ');
  //filter in column 0, with an regex, no smart filtering, no inputbox,not case sensitive
  otable.fnFilter(types, 0, true, true, false, true);
}