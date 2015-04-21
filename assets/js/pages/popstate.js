History.Adapter.bind(window,'statechange',function(){ // Note: We are using statechange instead of popstate
	var State = History.getState();
	var type = State.data.type;
	if (type == "pages") {
		fnPageDetailPopup( State.data.id );		
	} else if (type == "trips") {
		fnDrawPlanTrip ();
	}
});
function fnCloseAllPopup( ){
	onCloseTripList( );
	fnCloseAllPopupPopup();
	fnCloseProfile();
}