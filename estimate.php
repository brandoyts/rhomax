<?php
    $title = "Rhomax | Free Estimate";
    include_once "./includes/partials/header.php";
?>
<div
    class="estimate-form-container"
>
    <div class="logo">
        <h3>
            <span class="text-red">r</span
            ><span class="text-yellow">homax</span>
        </h3>
        <p class="text-yellow">Free Estimation</p>
    </div>
    <form action="./includes/submit.php" method="POST" enctype="multipart/form-data">
        <table width="100%">
            <th align="left" colspan="2">Client's Information</th>
            <tr>
                <td>First name:</td>
                <td align="right">
                    <input type="text" name="fname" placeholder="first name" required/>
                </td>
            </tr>
            <tr>
                <td>Last name:</td>
                <td align="right">
                    <input type="text" name="lname" placeholder="last name" required/>
                </td>
            </tr>

            <tr>
                <td>Email:</td>
                <td align="right">
                    <input type="email" name="email" placeholder="email" required/>
                </td>
            </tr>
            <tr>
                <td>Contact number:</td>
                <td align="right">
                    <input
                        type="text"
                        name="contact"
                        placeholder="contact number"
                        required
                    />
                </td>
            </tr>
            <tr>
                <td>Best time to call:</td>
                <td align="right">
                    <input
                        type="text"
                        name="time-to-call"
                        placeholder="best time to call"
                        required
                    />
                </td>
            </tr>
        </table>

        <table width="100%">
            <th align="left" colspan="2">Property Information</th>
            <tr>
                <td>Lot Area (sqm):</td>
                <td align="right">
                    <input type="text" name="lot-area" placeholder="lot area" required/>
                </td>
            </tr>
            <tr>
                <td>Length:</td>
                <td align="right">
                    <input type="text" name="length" placeholder="length" required/>
                </td>
            </tr>
            <tr>
                <td>Width:</td>
                <td align="right">
                    <input type="text" name="width" placeholder="width" required/>
                </td>
            </tr>
            <tr>
                <td>Location of Property:</td>
                <td align="right">
                    <input type="text" name="location-of-property" placeholder="address" required/>
                </td>
            </tr>
            <tr>
                <td><small>(or upload a google map image)</small></td>
                <td align="right">
                    <input type="file" name="img"/>
                </td>
            </tr>
        </table>

        <table width="100%">
            <th align="left" colspan="2">Desired Specification</th>
            <tr>
                <td>Floor Area:</td>
                <td align="right">
                    <input
                        type="text"
                        name="floor-area"
                        placeholder="floor area"
                        required
                    />
                </td>
            </tr>
            <tr>
                <td>Floor Level:</td>
                <td align="right">
                    <select name="floor-level">
                        <option value="1" selected="selected">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Number of Room(s):</td>
                <td align="right">
                    <select name="number-of-rooms">
                        <option value="1" selected="selected">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Number of Toilet(s):</td>
                <td align="right">
                    <select name="number-of-toilets">
                        <option value="1" selected="selected">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Car Garage:</td>
                <td align="right">
                    <select name="garage">
                        <option value="0" selected="selected">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Preffered Design:</td>
                <td align="right">
                    <select name="design">
                        <option value="asian" selected="selected">asian</option>
                        <option value="african">african</option>
                        <option value="neoclassical">neoclassical</option>
                        <option value="colonial">colonial</option>
                        <option value="american">american</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Preffered Finish:</td>
                <td align="right">
                    <select name="finish">
                        <option value="mastic" selected="selected"
                            >mastic</option
                        >
                        <option value="terrazzo">terrazzo</option>
                        <option value="stone">stone</option>
                        <option value="metal lathing">metal lathing</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Others:</td>
                <td align="right">
                    <select name="others">
                        <option value="none" selected="selected">none</option>
                        <option value="gate-fence">gate fence</option>
                        <option value="jaluzi">jaluzi</option>
                    </select>
                </td>
            </tr>
        </table>

        <table width="100%">
            <th align="left" colspan="2">
                Payment and Date of Construction
            </th>
            <tr>
                <td>
                    Approximate Budget:
                </td>
                <td align="right">
                    <input
                        type="text"
                        name="budget"
                        placeholder="minimum 500,000 php"
                        required
                    />
                </td>
            </tr>
            <tr>
                <td>Payment Scheme:</td>
                <td align="right">
                    <select name="scheme">
                        <option value="cash" selected="selected">cash</option>
                        <option value="bank">bank</option>
                        <option value="pagibig">pagibig</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Date of Construction:</td>
                <td align="right"><input type="date" name="date" /></td>
            </tr>
        </table>

        <table width="100%">
            <tr>
                <td>
                    <a href="index.php" class="cta-btn cancel-btn">cancel</a>
                </td>
                <td align="right">
                    <button
                        class="cta-btn submit-btn"
                        type="submit"
                        name="submit-btn"
                    >
                        submit
                    </button>
                </td>
            </tr>
        </table>
    </form>
</div>
<?php include_once "./includes/partials/footer.php"; ?>
