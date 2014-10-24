var disciplineDisplays = {
  siege: {display: 'Siege', hint: "Siege"},
  splitPush: {display: 'SPush', hint: "Split Push"},
  teamFight: {display: 'TFight', hint: "Team Fight"},
  disengage: {display: 'DisGage', hint: "Disengage"}
}

var championDisplayData = {
  Aatrox:        {display: 'Aatrox'},
  Ahri:          {display: 'Ahri'},
  Akali:         {display: 'Akali'},
  Alistar:       {display: 'Alistar'},
  Amumu:         {display: 'Amumu'},
  Anivia:        {display: 'Anivia'},
  Annie:         {display: 'Annie'},
  Ashe:          {display: 'Ashe'},
  Azir:          {display: 'Azir'},
  Blitzcrank:    {display: 'Blitzcrank'},
  Brand:         {display: 'Brand'},
  Braum:         {display: 'Braum'},
  Caitlyn:       {display: 'Caitlyn'},
  Cassiopeia:    {display: 'Cassiopeia'},
  ChoGath:       {display: 'Cho\'Gath'},
  Corki:         {display: 'Corki'},
  Darius:        {display: 'Darius'},
  Diana:         {display: 'Diana'},
  DrMundo:       {display: 'Dr. Mundo'},
  Draven:        {display: 'Draven'},
  Elise:         {display: 'Elise'},
  Evelynn:       {display: 'Evelynn'},
  Ezreal:        {display: 'Ezreal'},
  Fiddlesticks:  {display: 'Fiddlesticks'},
  Fiora:         {display: 'Fiora'},
  Fizz:          {display: 'Fizz'},
  Galio:         {display: 'Galio'},
  Gangplank:     {display: 'Gangplank'},
  Garen:         {display: 'Garen'},
  Gnar:          {display: 'Gnar'},
  Gragas:        {display: 'Gragas'},
  Graves:        {display: 'Graves'},
  Hecarim:       {display: 'Hecarim'},
  Heimerdinger:  {display: 'Heimerdinger'},
  Irelia:        {display: 'Irelia'},
  Janna:         {display: 'Janna'},
  JarvanIV:      {display: 'Jarvan IV'},
  Jax:           {display: 'Jax'},
  Jayce:         {display: 'Jayce'},
  Jinx:          {display: 'Jinx'},
  Karma:         {display: 'Karma'},
  Karthus:       {display: 'Karthus'},
  Kassadin:      {display: 'Kassadin'},
  Katarina:      {display: 'Katarina'},
  Kayle:         {display: 'Kayle'},
  Kennen:        {display: 'Kennen'},
  KhaZix:        {display: 'Kha\'Zix'},
  KogMaw:        {display: 'Kog\'Maw'},
  LeBlanc:       {display: 'LeBlanc'},
  LeeSin:        {display: 'Lee Sin'},
  Leona:         {display: 'Leona'},
  Lissandra:     {display: 'Lissandra'},
  Lucian:        {display: 'Lucian'},
  Lulu:          {display: 'Lulu'},
  Lux:           {display: 'Lux'},
  Malphite:      {display: 'Malphite'},
  Malzahar:      {display: 'Malzahar'},
  Maokai:        {display: 'Maokai'},
  MasterYi:      {display: 'Master Yi'},
  MissFortune:   {display: 'Miss Fortune'},
  Mordekaiser:   {display: 'Mordekaiser'},
  Morgana:       {display: 'Morgana'},
  Nami:          {display: 'Nami'},
  Nasus:         {display: 'Nasus'},
  Nautilus:      {display: 'Nautilus'},
  Nidalee:       {display: 'Nidalee'},
  Nocturne:      {display: 'Nocturne'},
  Nunu:          {display: 'Nunu'},
  Olaf:          {display: 'Olaf'},
  Orianna:       {display: 'Orianna'},
  Pantheon:      {display: 'Pantheon'},
  Poppy:         {display: 'Poppy'},
  Quinn:         {display: 'Quinn'},
  Rammus:        {display: 'Rammus'},
  Renekton:      {display: 'Renekton'},
  Rengar:        {display: 'Rengar'},
  Riven:         {display: 'Riven'},
  Rumble:        {display: 'Rumble'},
  Ryze:          {display: 'Ryze'},
  Sejuani:       {display: 'Sejuani'},
  Shaco:         {display: 'Shaco'},
  Shen:          {display: 'Shen'},
  Shyvana:       {display: 'Shyvana'},
  Singed:        {display: 'Singed'},
  Sion:          {display: 'Sion'},
  Sivir:         {display: 'Sivir'},
  Skarner:       {display: 'Skarner'},
  Sona:          {display: 'Sona'},
  Soraka:        {display: 'Soraka'},
  Swain:         {display: 'Swain'},
  Syndra:        {display: 'Syndra'},
  Talon:         {display: 'Talon'},
  Taric:         {display: 'Taric'},
  Teemo:         {display: 'Teemo'},
  Thresh:        {display: 'Thresh'},
  Tristana:      {display: 'Tristana'},
  Trundle:       {display: 'Trundle'},
  Tryndamere:    {display: 'Tryndamere'},
  TwistedFate:   {display: 'Twisted Fate'},
  Twitch:        {display: 'Twitch'},
  Udyr:          {display: 'Udyr'},
  Urgot:         {display: 'Urgot'},
  Varus:         {display: 'Varus'},
  Vayne:         {display: 'Vayne'},
  Veigar:        {display: 'Veigar'},
  VelKoz:        {display: 'Vel\'Koz'},
  Vi:            {display: 'Vi'},
  Viktor:        {display: 'Viktor'},
  Vladimir:      {display: 'Vladimir'},
  Volibear:      {display: 'Volibear'},
  Warwick:       {display: 'Warwick'},
  Wukong:        {display: 'Wukong'},
  Xerath:        {display: 'Xerath'},
  XinZhao:       {display: 'Xin Zhao'},
  Yasuo:         {display: 'Yasuo'},
  Yorick:        {display: 'Yorick'},
  Zac:           {display: 'Zac'},
  Zed:           {display: 'Zed'},
  Ziggs:         {display: 'Ziggs'},
  Zilean:        {display: 'Zilean'},
  Zyra:          {display: 'Zyra'},
}