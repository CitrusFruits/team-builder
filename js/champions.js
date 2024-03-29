var championData = {
Aatrox:        {disengage: 2, teamFight: 2, siege: 1, splitPush: 4},
Ahri:          {disengage: 2, teamFight: 3, siege: 4, splitPush: 3},
Akali:         {disengage: 3, teamFight: 3, siege: 1, splitPush: 2},
Alistar:       {disengage: 5, teamFight: 5, siege: 3, splitPush: 3},
Amumu:         {disengage: 3, teamFight: 5, siege: 2, splitPush: 2},
Anivia:        {disengage: 3, teamFight: 4, siege: 4, splitPush: 2},
Annie:         {disengage: 4, teamFight: 3, siege: 3, splitPush: 1},
Ashe:          {disengage: 3, teamFight: 4, siege: 5, splitPush: 2},
Azir:          {disengage: 3, teamFight: 3, siege: 3, splitPush: 1},
Blitzcrank:    {disengage: 2, teamFight: 2, siege: 4, splitPush: 3},
Brand:         {disengage: 1, teamFight: 5, siege: 3, splitPush: 2},
Braum:         {disengage: 5, teamFight: 5, siege: 1, splitPush: 1},
Caitlyn:       {disengage: 2, teamFight: 3, siege: 5, splitPush: 2},
Cassiopeia:    {disengage: 2, teamFight: 4, siege: 3, splitPush: 2},
ChoGath:       {disengage: 3, teamFight: 3, siege: 3, splitPush: 3},
Corki:         {disengage: 3, teamFight: 2, siege: 5, splitPush: 3},
Darius:        {disengage: 1, teamFight: 3, siege: 2, splitPush: 2},
Diana:         {disengage: 1, teamFight: 3, siege: 3, splitPush: 3},
DrMundo:       {disengage: 3, teamFight: 5, siege: 3, splitPush: 4},
Draven:        {disengage: 2, teamFight: 3, siege: 3, splitPush: 2},
Elise:         {disengage: 2, teamFight: 1, siege: 2, splitPush: 2},
Evelynn:       {disengage: 2, teamFight: 3, siege: 1, splitPush: 3},
Ezreal:        {disengage: 2, teamFight: 4, siege: 4, splitPush: 5},
Fiddlesticks:  {disengage: 2, teamFight: 5, siege: 4, splitPush: 1},
Fiora:         {disengage: 1, teamFight: 3, siege: 1, splitPush: 3},
Fizz:          {disengage: 2, teamFight: 3, siege: 1, splitPush: 2},
Galio:         {disengage: 5, teamFight: 4, siege: 4, splitPush: 3},
Gangplank:     {disengage: 4, teamFight: 2, siege: 2, splitPush: 3},
Garen:         {disengage: 1, teamFight: 3, siege: 1, splitPush: 4},
Gnar:          {disengage: 2, teamFight: 3, siege: 3, splitPush: 3},
Gragas:        {disengage: 5, teamFight: 3, siege: 5, splitPush: 3},
Graves:        {disengage: 3, teamFight: 4, siege: 3, splitPush: 2},
Hecarim:       {disengage: 2, teamFight: 3, siege: 1, splitPush: 3},
Heimerdinger:  {disengage: 3, teamFight: 3, siege: 5, splitPush: 4},
Irelia:        {disengage: 1, teamFight: 4, siege: 1, splitPush: 4},
Janna:         {disengage: 5, teamFight: 4, siege: 3, splitPush: 1},
JarvanIV:      {disengage: 3, teamFight: 4, siege: 4, splitPush: 3},
Jax:           {disengage: 3, teamFight: 4, siege: 1, splitPush: 5},
Jayce:         {disengage: 4, teamFight: 3, siege: 5, splitPush: 4},
Jinx:          {disengage: 2, teamFight: 4, siege: 4, splitPush: 2},
Karma:         {disengage: 4, teamFight: 4, siege: 3, splitPush: 2},
Karthus:       {disengage: 3, teamFight: 5, siege: 3, splitPush: 2},
Kassadin:      {disengage: 2, teamFight: 3, siege: 1, splitPush: 3},
Katarina:      {disengage: 2, teamFight: 4, siege: 1, splitPush: 2},
Kayle:         {disengage: 3, teamFight: 4, siege: 2, splitPush: 4},
Kennen:        {disengage: 4, teamFight: 5, siege: 3, splitPush: 3},
KhaZix:        {disengage: 3, teamFight: 3, siege: 2, splitPush: 3},
KogMaw:        {disengage: 2, teamFight: 4, siege: 5, splitPush: 3},
LeBlanc:       {disengage: 2, teamFight: 1, siege: 2, splitPush: 1},
LeeSin:        {disengage: 4, teamFight: 3, siege: 2, splitPush: 2},
Leona:         {disengage: 5, teamFight: 5, siege: 5, splitPush: 2},
Lissandra:     {disengage: 3, teamFight: 4, siege: 2, splitPush: 2},
Lucian:        {disengage: 2, teamFight: 5, siege: 3, splitPush: 4},
Lulu:          {disengage: 5, teamFight: 4, siege: 3, splitPush: 2},
Lux:           {disengage: 3, teamFight: 4, siege: 4, splitPush: 2},
Malphite:      {disengage: 2, teamFight: 4, siege: 4, splitPush: 3},
Malzahar:      {disengage: 1, teamFight: 2, siege: 4, splitPush: 2},
Maokai:        {disengage: 2, teamFight: 5, siege: 3, splitPush: 3},
MasterYi:      {disengage: 2, teamFight: 2, siege: 1, splitPush: 5},
MissFortune:   {disengage: 1, teamFight: 4, siege: 3, splitPush: 3},
Mordekaiser:   {disengage: 1, teamFight: 3, siege: 2, splitPush: 3},
Morgana:       {disengage: 3, teamFight: 4, siege: 3, splitPush: 1},
Nami:          {disengage: 5, teamFight: 5, siege: 3, splitPush: 1},
Nasus:         {disengage: 2, teamFight: 4, siege: 3, splitPush: 5},
Nautilus:      {disengage: 3, teamFight: 4, siege: 2, splitPush: 3},
Nidalee:       {disengage: 2, teamFight: 1, siege: 5, splitPush: 4},
Nocturne:      {disengage: 2, teamFight: 3, siege: 2, splitPush: 3},
Nunu:          {disengage: 2, teamFight: 3, siege: 2, splitPush: 1},
Olaf:          {disengage: 2, teamFight: 2, siege: 2, splitPush: 4},
Orianna:       {disengage: 4, teamFight: 5, siege: 4, splitPush: 2},
Pantheon:      {disengage: 1, teamFight: 2, siege: 2, splitPush: 3},
Poppy:         {disengage: 2, teamFight: 3, siege: 1, splitPush: 3},
Quinn:         {disengage: 2, teamFight: 2, siege: 2, splitPush: 3},
Rammus:        {disengage: 2, teamFight: 4, siege: 2, splitPush: 3},
Renekton:      {disengage: 2, teamFight: 4, siege: 1, splitPush: 4},
Rengar:        {disengage: 2, teamFight: 3, siege: 1, splitPush: 3},
Riven:         {disengage: 3, teamFight: 3, siege: 1, splitPush: 4},
Rumble:        {disengage: 4, teamFight: 5, siege: 3, splitPush: 3},
Ryze:          {disengage: 2, teamFight: 4, siege: 2, splitPush: 2},
Sejuani:       {disengage: 3, teamFight: 4, siege: 4, splitPush: 2},
Shaco:         {disengage: 2, teamFight: 1, siege: 1, splitPush: 4},
Shen:          {disengage: 2, teamFight: 2, siege: 2, splitPush: 4},
Shyvana:       {disengage: 2, teamFight: 3, siege: 2, splitPush: 3},
Singed:        {disengage: 5, teamFight: 4, siege: 2, splitPush: 5},
Sion:          {disengage: 3, teamFight: 4, siege: 3, splitPush: 3},
Sivir:         {disengage: 4, teamFight: 4, siege: 5, splitPush: 4},
Skarner:       {disengage: 3, teamFight: 3, siege: 2, splitPush: 3},
Sona:          {disengage: 4, teamFight: 4, siege: 3, splitPush: 1},
Soraka:        {disengage: 1, teamFight: 3, siege: 4, splitPush: 1},
Swain:         {disengage: 2, teamFight: 4, siege: 3, splitPush: 2},
Syndra:        {disengage: 2, teamFight: 3, siege: 4, splitPush: 2},
Talon:         {disengage: 2, teamFight: 2, siege: 1, splitPush: 4},
Taric:         {disengage: 2, teamFight: 3, siege: 2, splitPush: 2},
Teemo:         {disengage: 2, teamFight: 1, siege: 2, splitPush: 5},
Thresh:        {disengage: 4, teamFight: 4, siege: 2, splitPush: 1},
Tristana:      {disengage: 3, teamFight: 4, siege: 5, splitPush: 4},
Trundle:       {disengage: 3, teamFight: 3, siege: 4, splitPush: 3},
Tryndamere:    {disengage: 2, teamFight: 2, siege: 1, splitPush: 5},
TwistedFate:   {disengage: 3, teamFight: 2, siege: 3, splitPush: 4},
Twitch:        {disengage: 2, teamFight: 5, siege: 3, splitPush: 3},
Udyr:          {disengage: 3, teamFight: 3, siege: 1, splitPush: 5},
Urgot:         {disengage: 1, teamFight: 1, siege: 4, splitPush: 2},
Varus:         {disengage: 2, teamFight: 3, siege: 3, splitPush: 2},
Vayne:         {disengage: 2, teamFight: 4, siege: 2, splitPush: 3},
Veigar:        {disengage: 4, teamFight: 3, siege: 4, splitPush: 2},
VelKoz:        {disengage: 3, teamFight: 3, siege: 5, splitPush: 1},
Vi:            {disengage: 2, teamFight: 4, siege: 1, splitPush: 3},
Viktor:        {disengage: 4, teamFight: 4, siege: 4, splitPush: 2},
Vladimir:      {disengage: 2, teamFight: 2, siege: 2, splitPush: 3},
Volibear:      {disengage: 1, teamFight: 3, siege: 2, splitPush: 2},
Warwick:       {disengage: 1, teamFight: 3, siege: 1, splitPush: 1},
Wukong:        {disengage: 3, teamFight: 4, siege: 1, splitPush: 2},
Xerath:        {disengage: 2, teamFight: 3, siege: 5, splitPush: 1},
XinZhao:       {disengage: 1, teamFight: 3, siege: 1, splitPush: 3},
Yasuo:         {disengage: 3, teamFight: 5, siege: 4, splitPush: 4},
Yorick:        {disengage: 1, teamFight: 3, siege: 3, splitPush: 3},
Zac:           {disengage: 3, teamFight: 4, siege: 3, splitPush: 3},
Zed:           {disengage: 2, teamFight: 2, siege: 2, splitPush: 4},
Ziggs:         {disengage: 3, teamFight: 4, siege: 5, splitPush: 2},
Zilean:        {disengage: 3, teamFight: 4, siege: 3, splitPush: 1},
Zyra:          {disengage: 4, teamFight: 3, siege: 3, splitPush: 1}
}