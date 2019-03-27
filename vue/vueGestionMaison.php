<center>
<!----Serrure--------------->

<!-- Insertion du titre avec la class (CSS) -->
<h2 class="title_h2">Porte d'entrée:</h2>

<!-- Définition des div pour le texte inscrit dans les boutons -->
<div id="contentEtatSerrureOn">Déverouillé</div>
<div id="contentEtatSerrureOff">Verouillé</div>
<div id="loadingEtatSerrure"><img src="http://www.mediaforma.com/sdz/jquery/ajax-loader.gif"></div>

<!-- Insertion des boutons -->
<input type="submit" id="submitSerrureOff" value="Verouiller" class="btn bouton_rouge"/>
<input type="submit" id="submitSerrureOn" value="Déverouiller" class="btn bouton_vert"/>

<!----Lumiere--------------->
<h2 class="title_h2">Lumière:</h2>
<div id="contentEtatLumiereOn">Allumée</div>
<div id="contentEtatLumiereOff">Eteinte</div>
<div id="loadingEtatLumiere"><img src="http://www.mediaforma.com/sdz/jquery/ajax-loader.gif"></div>
<input type="submit" id="submitLumiereOff" value="Eteindre" class="btn bouton_rouge"/>
<input type="submit" id="submitLumiereOn" value="Allumer" class="btn bouton_vert"/>

<!----Volet--------------->
<h2 class="title_h2">Volets:</h2>
<div id="contentEtatVoletOn">Ouvert</div>
<div id="contentEtatVoletOff">Fermé</div>
<div id="loadingEtatVolet"><img src="http://www.mediaforma.com/sdz/jquery/ajax-loader.gif"></div>
<input type="submit" id="submitVoletOff" value="Fermer" class="btn bouton_rouge"/>
<input type="submit" id="submitVoletOn"  value="Ouvrir" class="btn bouton_vert"/>
<!----Alarme--------------->
<h2 class="title_h2">Alarme:</h2>
<div id="contentEtatAlarmeOn">Activé</div>
<div id="contentEtatAlarmeOff">Désactivé</div>
<div id="loadingEtatAlarme"><img src="http://www.mediaforma.com/sdz/jquery/ajax-loader.gif"></div>
<input type="submit" id="submitAlarmeOff" value="Desactiver" class="btn bouton_rouge"/>
<input type="submit" id="submitAlarmeOn" value="Activer" class="btn bouton_vert"/>
<!----Radiateur--------------->
<h2 class="title_h2">Radiateurs:</h2>
<div id="contentEtatRadiateurArret">Arrêt</div>
<div id="contentEtatRadiateurHg">Hors gel</div>
<div id="contentEtatRadiateurEco">Eco</div>
<div id="contentEtatRadiateurConfort">Confort</div>
<div id="loadingEtatRadiateur"><img src="http://www.mediaforma.com/sdz/jquery/ajax-loader.gif"></div>
<table class="table_rad">
<tr> 
<th><input type="submit" id="submitRadiateurArret" value="Arrêt" class="btn bouton_bleu_fonce"/></th>
<th><input type="submit" id="submitRadiateurHg" value="Hors gel" class="btn bouton_bleu_ciel"/></th>
</tr>
<tr> 
<th><input type="submit" id="submitRadiateurEco" value="Eco" class="btn bouton_vert"/></th>
<th><input type="submit" id="submitRadiateurConfort" value="Confort" class="btn bouton_jaune"/></th> 
</tr>
</table>
</center>

<!----Script--------------->
<script>
$('#contentEtatSerrureOn').hide();
$('#contentEtatSerrureOff').hide();
$('#contentEtatLumiereOn').hide();
$('#contentEtatLumiereOff').hide();
$('#contentEtatVoletOn').hide();
$('#contentEtatVoletOff').hide();
$('#contentEtatAlarmeOn').hide();
$('#contentEtatAlarmeOff').hide();
$('#loadingEtatRadiateur').hide();
$('#contentEtatRadiateurArret').hide();
$('#contentEtatRadiateurHg').hide();
$('#contentEtatRadiateurConfort').hide();
$('#contentEtatRadiateurEco').hide();
</script>
<script src="assets/js/qf/etats.js"></script>