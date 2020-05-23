console.log("Commands: ");
console.log("Type 'input' or 'output' to see the raw data. Type 'data' to see the formatted data.");
console.log("Stay tuned for more functionality.");

const tabby = document.getElementById('tabby');
const trady = document.getElementById('traddy');
const conny = document.getElementById('conny');

// IDs 16 (2020-05-21 11:19:04) to 23 (2020-05-22 21:57:01)
const input = ['[{"proband":"anonymized_participant","tasks":[{"name":"traditional_evaluation","data":{"button_clicks":[4,0,5,3,2,1],"slider_value":[66,11,56,71,56,56]},"tlx":62,"output":"<table><thead><tr><th>Demand</th><th>Rating</th><th>Weight</th><th>Product</th></tr></thead><tbody><tr><td>Mental demand</td><td>66</td><td>4</td><td>264</td></tr><tr><td>Physical demand</td><td>11</td><td>0</td><td>0</td></tr><tr><td>Temporal demand</td><td>56</td><td>5</td><td>280</td></tr><tr><td>Performance</td><td>71</td><td>3</td><td>213</td></tr><tr><td>Effort</td><td>56</td><td>2</td><td>112</td></tr><tr><td>Frustration</td><td>56</td><td>1</td><td>56</td></tr><tr><th colspan="3">Product sum</th><td>925</td></tr><tr><th colspan="3">Total weights</th><td>15</td></tr><tr><th colspan="3">Rounded TLX score</th><td><strong>62</strong></td></tr></tbody></table>"}]}]', '[{"proband":"anonymized_participant","tasks":[{"name":"conversational_evaluation","data":{"button_clicks":[4,0,3,1,4,3],"slider_value":[76,21,66,31,66,66]},"tlx":66,"output":"<table><thead><tr><th>Demand</th><th>Rating</th><th>Weight</th><th>Product</th></tr></thead><tbody><tr><td>Mental demand</td><td>76</td><td>4</td><td>304</td></tr><tr><td>Physical demand</td><td>21</td><td>0</td><td>0</td></tr><tr><td>Temporal demand</td><td>66</td><td>3</td><td>198</td></tr><tr><td>Performance</td><td>31</td><td>1</td><td>31</td></tr><tr><td>Effort</td><td>66</td><td>4</td><td>264</td></tr><tr><td>Frustration</td><td>66</td><td>3</td><td>198</td></tr><tr><th colspan="3">Product sum</th><td>995</td></tr><tr><th colspan="3">Total weights</th><td>15</td></tr><tr><th colspan="3">Rounded TLX score</th><td><strong>66</strong></td></tr></tbody></table>"}]}]', '[{"proband":"anonymized_participant","tasks":[{"name":"conversational_evaluation","data":{"button_clicks":[2,0,1,5,3,4],"slider_value":[31,1,1,66,21,61]},"tlx":47,"output":"<table><thead><tr><th>Demand</th><th>Rating</th><th>Weight</th><th>Product</th></tr></thead><tbody><tr><td>Mental demand</td><td>31</td><td>2</td><td>62</td></tr><tr><td>Physical demand</td><td>1</td><td>0</td><td>0</td></tr><tr><td>Temporal demand</td><td>1</td><td>1</td><td>1</td></tr><tr><td>Performance</td><td>66</td><td>5</td><td>330</td></tr><tr><td>Effort</td><td>21</td><td>3</td><td>63</td></tr><tr><td>Frustration</td><td>61</td><td>4</td><td>244</td></tr><tr><th colspan="3">Product sum</th><td>700</td></tr><tr><th colspan="3">Total weights</th><td>15</td></tr><tr><th colspan="3">Rounded TLX score</th><td><strong>47</strong></td></tr></tbody></table>"}]}]', '[{"proband":"anonymized_participant","tasks":[{"name":"traditional_evaluation","data":{"button_clicks":[3,1,2,5,4,0],"slider_value":[21,11,50,16,6,21]},"tlx":19,"output":"<table><thead><tr><th>Demand</th><th>Rating</th><th>Weight</th><th>Product</th></tr></thead><tbody><tr><td>Mental demand</td><td>21</td><td>3</td><td>63</td></tr><tr><td>Physical demand</td><td>11</td><td>1</td><td>11</td></tr><tr><td>Temporal demand</td><td>50</td><td>2</td><td>100</td></tr><tr><td>Performance</td><td>16</td><td>5</td><td>80</td></tr><tr><td>Effort</td><td>6</td><td>4</td><td>24</td></tr><tr><td>Frustration</td><td>21</td><td>0</td><td>0</td></tr><tr><th colspan="3">Product sum</th><td>278</td></tr><tr><th colspan="3">Total weights</th><td>15</td></tr><tr><th colspan="3">Rounded TLX score</th><td><strong>19</strong></td></tr></tbody></table>"}]}]', '[{"proband":"anonymized_participant","tasks":[{"name":"traditional_evaluation","data":{"button_clicks":[5,0,1,2,4,3],"slider_value":[71,1,26,61,61,61]},"tlx":62,"output":"<table><thead><tr><th>Demand</th><th>Rating</th><th>Weight</th><th>Product</th></tr></thead><tbody><tr><td>Mental demand</td><td>71</td><td>5</td><td>355</td></tr><tr><td>Physical demand</td><td>1</td><td>0</td><td>0</td></tr><tr><td>Temporal demand</td><td>26</td><td>1</td><td>26</td></tr><tr><td>Performance</td><td>61</td><td>2</td><td>122</td></tr><tr><td>Effort</td><td>61</td><td>4</td><td>244</td></tr><tr><td>Frustration</td><td>61</td><td>3</td><td>183</td></tr><tr><th colspan="3">Product sum</th><td>930</td></tr><tr><th colspan="3">Total weights</th><td>15</td></tr><tr><th colspan="3">Rounded TLX score</th><td><strong>62</strong></td></tr></tbody></table>"}]}]', '[{"proband":"anonymized_participant","tasks":[{"name":"conversational_evaluation","data":{"button_clicks":[5,0,2,2,4,2],"slider_value":[26,11,16,21,31,16]},"tlx":24,"output":"<table><thead><tr><th>Demand</th><th>Rating</th><th>Weight</th><th>Product</th></tr></thead><tbody><tr><td>Mental demand</td><td>26</td><td>5</td><td>130</td></tr><tr><td>Physical demand</td><td>11</td><td>0</td><td>0</td></tr><tr><td>Temporal demand</td><td>16</td><td>2</td><td>32</td></tr><tr><td>Performance</td><td>21</td><td>2</td><td>42</td></tr><tr><td>Effort</td><td>31</td><td>4</td><td>124</td></tr><tr><td>Frustration</td><td>16</td><td>2</td><td>32</td></tr><tr><th colspan="3">Product sum</th><td>360</td></tr><tr><th colspan="3">Total weights</th><td>15</td></tr><tr><th colspan="3">Rounded TLX score</th><td><strong>24</strong></td></tr></tbody></table>"}]}]', '[{"proband":"anonymized_participant","tasks":[{"name":"conversational_evaluation","data":{"button_clicks":[3,5,1,0,2,4],"slider_value":[16,6,91,1,1,1]},"tlx":12,"output":"<table><thead><tr><th>Demand</th><th>Rating</th><th>Weight</th><th>Product</th></tr></thead><tbody><tr><td>Mental demand</td><td>16</td><td>3</td><td>48</td></tr><tr><td>Physical demand</td><td>6</td><td>5</td><td>30</td></tr><tr><td>Temporal demand</td><td>91</td><td>1</td><td>91</td></tr><tr><td>Performance</td><td>1</td><td>0</td><td>0</td></tr><tr><td>Effort</td><td>1</td><td>2</td><td>2</td></tr><tr><td>Frustration</td><td>1</td><td>4</td><td>4</td></tr><tr><th colspan="3">Product sum</th><td>175</td></tr><tr><th colspan="3">Total weights</th><td>15</td></tr><tr><th colspan="3">Rounded TLX score</th><td><strong>12</strong></td></tr></tbody></table>"}]}]', '[{"proband":"anonymized_participant","tasks":[{"name":"traditional_evaluation","data":{"button_clicks":[4,2,1,5,3,0],"slider_value":[26,11,31,1,21,6]},"tlx":15,"output":"<table><thead><tr><th>Demand</th><th>Rating</th><th>Weight</th><th>Product</th></tr></thead><tbody><tr><td>Mental demand</td><td>26</td><td>4</td><td>104</td></tr><tr><td>Physical demand</td><td>11</td><td>2</td><td>22</td></tr><tr><td>Temporal demand</td><td>31</td><td>1</td><td>31</td></tr><tr><td>Performance</td><td>1</td><td>5</td><td>5</td></tr><tr><td>Effort</td><td>21</td><td>3</td><td>63</td></tr><tr><td>Frustration</td><td>6</td><td>0</td><td>0</td></tr><tr><th colspan="3">Product sum</th><td>225</td></tr><tr><th colspan="3">Total weights</th><td>15</td></tr><tr><th colspan="3">Rounded TLX score</th><td><strong>15</strong></td></tr></tbody></table>"}]}]'];

let output = [];

let uid = ['6453530', '4915716', '3265523', '6897737', '3859215', '9771399', '7184914', '4095914'];
// Note: '3833158' did not complete NASA TLX

// Loop through all input values
for (i=0; i<input.length; i++) {
  // First: remove the problematic ` colspan="3"`
  // We have three offenders, so we run the function thrice
  for (j = 0; j < 3; j++) {
    input[i] = input[i].replace(' colspan="3"', '');
  }

  output.push(JSON.parse(input[i]));
}

// Our data object — 2d table that contains all NASA TLX data gathered.
// let id = [];
// let variant = [];
// let tlx_score = [];
// let tlx_mental = [];
// let tlx_physical = [];
// let tlx_temporal = [];
// let tlx_performance = [];
// let tlx_effort = [];
// let tlx_frustration = [];


// Loop through all output values
for (i=0; i<output.length; i++) {
  // id.push(i);
  // variant.push(output[i][0].tasks[0].name);
  // tlx_score.push(output[i][0].tasks[0].tlx);
  //
  // tlx_mental.push(output[i][0].tasks[0].data.slider_value[0]);
  // tlx_physical.push(output[i][0].tasks[0].data.slider_value[1]);
  // tlx_temporal.push(output[i][0].tasks[0].data.slider_value[2]);
  // tlx_performance.push(output[i][0].tasks[0].data.slider_value[3]);
  // tlx_effort.push(output[i][0].tasks[0].data.slider_value[4]);
  // tlx_frustration.push(output[i][0].tasks[0].data.slider_value[5]);

  let newRowContent = `<tr>
                          <td>${uid[i]}</td>
                          <td>${output[i][0].tasks[0].name.replace('tional_evaluation', '')}</td>
                          <td>${output[i][0].tasks[0].tlx}</td>
                          <td>${output[i][0].tasks[0].data.slider_value[0]}</td>
                          <td>${output[i][0].tasks[0].data.slider_value[1]}</td>
                          <td>${output[i][0].tasks[0].data.slider_value[2]}</td>
                          <td>${output[i][0].tasks[0].data.slider_value[3]}</td>
                          <td>${output[i][0].tasks[0].data.slider_value[4]}</td>
                          <td>${output[i][0].tasks[0].data.slider_value[5]}</td>
                      </tr>`;

  tabby.children[0].insertAdjacentHTML('beforeEnd', newRowContent);

  if (output[i][0].tasks[0].name.includes('tradi')) {
    traddy.children[0].insertAdjacentHTML('beforeEnd', newRowContent);
  } else if (output[i][0].tasks[0].name.includes('conversa')) {
    conny.children[0].insertAdjacentHTML('beforeEnd', newRowContent);
  }
}
