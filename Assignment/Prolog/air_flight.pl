airport(toronto, 50, 60).
airport(london, 75, 80).
airport(madrid, 75, 45).
airport(barcelona, 40, 30).
airport(valencia, 40, 20).
airport(malaga, 50, 30).
airport(paris, 50, 60).
airport(tolouse, 40, 30).
flight(toronto, london, air_canada, 500, 360).                                 
flight(toronto, london, united, 650, 420).                                     
flight(toronto, madrid, air_canada, 900, 480).                                 
flight(toronto, madrid, united, 950, 540).                                     
flight(toronto, madrid, iberia, 800, 480).                                     
flight(madrid, barcelona, air_canada, 100, 60).                                
flight(madrid, barcelona, iberia, 120, 65).                                    
flight(madrid, valencia, iberia, 40, 50).                                      
flight(madrid, malaga, iberia, 50, 60).                                        
flight(barcelona, london, iberia, 220, 240).                                   
flight(barcelona, valencia, iberia, 110, 75).
flight(valencia, malaga, iberia, 80, 120).
flight(paris, tolouse, united, 35, 120).

isa_flight(A, B):-flight(A, B, _, _, _);flight(B, A, _, _, _).
isflight_cheap(A, B, C) :-(flight(A, B, C, T, M) ; flight(B, A, C, T, M)), <(M, 400).
islink_flight(A, B) :- isa_flight(A, X) , isa_flight(X, B).
isflight_pref(A, B, C) :- isflight_cheap(A, B, C) ; C = air_canada.
flight_check(A, B) :- (flight(A, B, united, _,_) ; flight(B, A, united, _, _)) ,( flight(A, B, air_canada, _, _) ; flight(B, A, air_canada, _, _)).
