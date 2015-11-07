Public Class formPoints
    Private Sub formPoints_FormClosing(ByVal sender As Object, ByVal e As System.Windows.Forms.FormClosingEventArgs) Handles Me.FormClosing
        formMain.pointEditorOpen = False
    End Sub
    Private Sub formPoints_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Me.MaximizeBox = False
        comboFilterArgument.SelectedIndex = 0
        comboFilterFilter.SelectedIndex = 0
        recalculate()
    End Sub

    Private Sub listPoints_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles listPoints.SelectedIndexChanged
        If (listPoints.SelectedIndices.Count = 1) Then
            Dim selectedIndexString As String = ""
            For i As Integer = 1 To 5
                If (Mid(listPoints.SelectedItem, i, 1) = ":") Then GoTo endOfNumber
                selectedIndexString = selectedIndexString & Mid(listPoints.SelectedItem, i, 1)
            Next
endOfNumber:
            Dim selectedIndex As Integer = CInt(selectedIndexString)
            txtPointX.Text = CStr(formMain.xval(selectedIndex))
            txtPointY.Text = CStr(formMain.yval(selectedIndex))
            txtPointZ.Text = CStr(formMain.zval(selectedIndex))
        ElseIf (listPoints.SelectedIndices.Count > 1) Then
            txtPointX.Text = "X"
            txtPointY.Text = "Y"
            txtPointZ.Text = "Z"
        Else
            txtPointX.Text = ""
            txtPointY.Text = ""
            txtPointZ.Text = ""
        End If
    End Sub
    Private Sub comboFilterFilter_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles comboFilterFilter.SelectedIndexChanged
        If (comboFilterFilter.SelectedIndex = 0 Or comboFilterFilter.SelectedIndex = 5 Or comboFilterFilter.SelectedIndex = 6) Then
            txtFilterValue.Visible = False
        Else
            txtFilterValue.Visible = True
        End If

        If (comboFilterFilter.SelectedIndex = 4) Then
            txtFilterValue.Size = New Size(50, 20)
            lblAnd.Visible = True
            txtFilterValue2.Visible = True
        Else
            txtFilterValue.Size = New Size(137, 20)
            lblAnd.Visible = False
            txtFilterValue2.Visible = False
        End If
    End Sub
    Private Sub comboFilterArgument_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles comboFilterArgument.SelectedIndexChanged
        If (comboFilterArgument.SelectedIndex = 0 And comboFilterFilter.Items.Count <= 5 And formMain.cboxShowMeshPoints.Checked = True) Then
            comboFilterFilter.Items.Add("A Collision Vertex")
            comboFilterFilter.Items.Add("A Mesh Vertex")
        ElseIf (comboFilterArgument.SelectedIndex > 0 And comboFilterFilter.Items.Count > 5) Then
            comboFilterFilter.Items.RemoveAt(6)
            comboFilterFilter.Items.RemoveAt(5)
        End If
    End Sub

    Private Sub btnChange_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnChange.Click
        Dim stringx, stringy, stringz As String
        stringx = txtPointX.Text.ToLower()
        stringy = txtPointY.Text.ToLower()
        stringz = txtPointZ.Text.ToLower()

        Dim newx, newy, newz As Double
        Try
            newx = CDbl(txtPointX.Text)
        Catch
        End Try
        Try
            newy = CDbl(txtPointY.Text)
        Catch
        End Try
        Try
            newz = CDbl(txtPointZ.Text)
        Catch
        End Try
        'Only gets X, Y, and Z new values for values that are valid numbers.

        If (listPoints.SelectedIndices.Count = 1) Then
            Try
                Dim realIndexString As String = ""
                Dim realIndex As Integer = 0
                For c As Integer = 1 To 5
                    If (Mid(listPoints.Items.Item(listPoints.SelectedIndex), c, 1) = ":") Then GoTo endOfSingNumber
                    realIndexString = realIndexString & Mid(listPoints.Items.Item(listPoints.SelectedIndex), c, 1)
                Next
endOfSingNumber:
                realIndex = CInt(realIndexString)
                If (Mid(stringx, 1, 1) = "x" And stringx.Length > 1) Then
                    If (Mid(stringx, 2, 1) = "*") Then
                        formMain.xval(listPoints.SelectedIndex) = formMain.xval(listPoints.SelectedIndex) * Mid(stringx, 3, stringx.Length - 1)
                    ElseIf (Mid(stringx, 2, 1) = "/") Then
                        formMain.xval(listPoints.SelectedIndex) = formMain.xval(listPoints.SelectedIndex) / Mid(stringx, 3, stringx.Length - 1)
                    Else
                        formMain.xval(listPoints.SelectedIndex) = formMain.xval(listPoints.SelectedIndex) + Mid(stringx, 2, stringx.Length - 1)
                    End If
                ElseIf (Mid(stringx, 1, 1) = "x") Then
                    formMain.xval(listPoints.SelectedIndex) = formMain.xval(listPoints.SelectedIndex)
                ElseIf (Mid(stringx, 1, 1) = "y" And stringx.Length > 1) Then
                    If (Mid(stringx, 2, 1) = "*") Then
                        formMain.xval(listPoints.SelectedIndex) = formMain.yval(listPoints.SelectedIndex) * Mid(stringx, 3, stringx.Length - 1)
                    ElseIf (Mid(stringx, 2, 1) = "/") Then
                        formMain.xval(listPoints.SelectedIndex) = formMain.yval(listPoints.SelectedIndex) / Mid(stringx, 3, stringx.Length - 1)
                    Else
                        formMain.xval(listPoints.SelectedIndex) = formMain.yval(listPoints.SelectedIndex) + Mid(stringx, 2, stringx.Length - 1)
                    End If
                ElseIf (Mid(stringx, 1, 1) = "y") Then
                    formMain.xval(listPoints.SelectedIndex) = formMain.yval(listPoints.SelectedIndex)
                ElseIf (Mid(stringx, 1, 1) = "z" And stringx.Length > 1) Then
                    If (Mid(stringx, 2, 1) = "*") Then
                        formMain.xval(listPoints.SelectedIndex) = formMain.zval(listPoints.SelectedIndex) * Mid(stringx, 3, stringx.Length - 1)
                    ElseIf (Mid(stringx, 2, 1) = "/") Then
                        formMain.xval(listPoints.SelectedIndex) = formMain.zval(listPoints.SelectedIndex) / Mid(stringx, 3, stringx.Length - 1)
                    Else
                        formMain.xval(listPoints.SelectedIndex) = formMain.zval(listPoints.SelectedIndex) + Mid(stringx, 2, stringx.Length - 1)
                    End If
                ElseIf (Mid(stringx, 1, 1) = "z") Then
                    formMain.xval(listPoints.SelectedIndex) = formMain.zval(listPoints.SelectedIndex)
                Else
                    formMain.xval(listPoints.SelectedIndex) = newx
                End If

                If (Mid(stringy, 1, 1) = "x" And stringy.Length > 1) Then
                    If (Mid(stringy, 2, 1) = "*") Then
                        formMain.yval(listPoints.SelectedIndex) = formMain.xval(listPoints.SelectedIndex) * Mid(stringy, 3, stringy.Length - 1)
                    ElseIf (Mid(stringy, 2, 1) = "/") Then
                        formMain.yval(listPoints.SelectedIndex) = formMain.xval(listPoints.SelectedIndex) / Mid(stringy, 3, stringy.Length - 1)
                    Else
                        formMain.yval(listPoints.SelectedIndex) = formMain.xval(listPoints.SelectedIndex) + Mid(stringy, 2, stringy.Length - 1)
                    End If
                ElseIf (Mid(stringy, 1, 1) = "x") Then
                    formMain.yval(listPoints.SelectedIndex) = formMain.xval(listPoints.SelectedIndex)
                ElseIf (Mid(stringy, 1, 1) = "y" And stringy.Length > 1) Then
                    If (Mid(stringy, 2, 1) = "*") Then
                        formMain.yval(listPoints.SelectedIndex) = formMain.yval(listPoints.SelectedIndex) * Mid(stringy, 3, stringy.Length - 1)
                    ElseIf (Mid(stringy, 2, 1) = "/") Then
                        formMain.yval(listPoints.SelectedIndex) = formMain.yval(listPoints.SelectedIndex) / Mid(stringy, 3, stringy.Length - 1)
                    Else
                        formMain.yval(listPoints.SelectedIndex) = formMain.yval(listPoints.SelectedIndex) + Mid(stringy, 2, stringy.Length - 1)
                    End If
                ElseIf (Mid(stringy, 1, 1) = "y") Then
                    formMain.yval(listPoints.SelectedIndex) = formMain.yval(listPoints.SelectedIndex)
                ElseIf (Mid(stringy, 1, 1) = "z" And stringy.Length > 1) Then
                    If (Mid(stringy, 2, 1) = "*") Then
                        formMain.yval(listPoints.SelectedIndex) = formMain.zval(listPoints.SelectedIndex) * Mid(stringy, 3, stringy.Length - 1)
                    ElseIf (Mid(stringy, 2, 1) = "/") Then
                        formMain.yval(listPoints.SelectedIndex) = formMain.zval(listPoints.SelectedIndex) / Mid(stringy, 3, stringy.Length - 1)
                    Else
                        formMain.yval(listPoints.SelectedIndex) = formMain.zval(listPoints.SelectedIndex) + Mid(stringy, 2, stringy.Length - 1)
                    End If
                ElseIf (Mid(stringy, 1, 1) = "z") Then
                    formMain.yval(listPoints.SelectedIndex) = formMain.zval(listPoints.SelectedIndex)
                Else
                    formMain.yval(listPoints.SelectedIndex) = newy
                End If

                If (Mid(stringz, 1, 1) = "x" And stringz.Length > 1) Then
                    If (Mid(stringz, 2, 1) = "*") Then
                        formMain.zval(listPoints.SelectedIndex) = formMain.xval(listPoints.SelectedIndex) * Mid(stringz, 3, stringz.Length - 1)
                    ElseIf (Mid(stringz, 2, 1) = "/") Then
                        formMain.zval(listPoints.SelectedIndex) = formMain.xval(listPoints.SelectedIndex) / Mid(stringz, 3, stringz.Length - 1)
                    Else
                        formMain.zval(listPoints.SelectedIndex) = formMain.xval(listPoints.SelectedIndex) + Mid(stringz, 2, stringz.Length - 1)
                    End If
                ElseIf (Mid(stringz, 1, 1) = "x") Then
                    formMain.zval(listPoints.SelectedIndex) = formMain.xval(listPoints.SelectedIndex)
                ElseIf (Mid(stringz, 1, 1) = "y" And stringz.Length > 1) Then
                    If (Mid(stringz, 2, 1) = "*") Then
                        formMain.zval(listPoints.SelectedIndex) = formMain.yval(listPoints.SelectedIndex) * Mid(stringz, 3, stringz.Length - 1)
                    ElseIf (Mid(stringz, 2, 1) = "/") Then
                        formMain.zval(listPoints.SelectedIndex) = formMain.yval(listPoints.SelectedIndex) / Mid(stringz, 3, stringz.Length - 1)
                    Else
                        formMain.zval(listPoints.SelectedIndex) = formMain.yval(listPoints.SelectedIndex) + Mid(stringz, 2, stringz.Length - 1)
                    End If
                ElseIf (Mid(stringz, 1, 1) = "y") Then
                    formMain.zval(listPoints.SelectedIndex) = formMain.yval(listPoints.SelectedIndex)
                ElseIf (Mid(stringz, 1, 1) = "z" And stringz.Length > 1) Then
                    If (Mid(stringz, 2, 1) = "*") Then
                        formMain.zval(listPoints.SelectedIndex) = formMain.zval(listPoints.SelectedIndex) * Mid(stringz, 3, stringz.Length - 1)
                    ElseIf (Mid(stringz, 2, 1) = "/") Then
                        formMain.zval(listPoints.SelectedIndex) = formMain.zval(listPoints.SelectedIndex) / Mid(stringz, 3, stringz.Length - 1)
                    Else
                        formMain.zval(listPoints.SelectedIndex) = formMain.zval(listPoints.SelectedIndex) + Mid(stringz, 2, stringz.Length - 1)
                    End If
                ElseIf (Mid(stringz, 1, 1) = "z") Then
                    formMain.zval(listPoints.SelectedIndex) = formMain.zval(listPoints.SelectedIndex)
                Else
                    formMain.zval(listPoints.SelectedIndex) = newz
                End If

                listPoints.Items.Item(listPoints.SelectedIndex) = (CStr(listPoints.SelectedIndex) & ":  X:" & CStr(formMain.xval(listPoints.SelectedIndex)) & " Y:" & CStr(formMain.yval(listPoints.SelectedIndex)) & " Z:" & CStr(formMain.zval(listPoints.SelectedIndex)))
            Catch ex As Exception
                MsgBox("One of the values is not a valid number.")
            End Try
        ElseIf (listPoints.SelectedIndices.Count > 1) Then
            If (MsgBox("Are you sure you want to change these " & listPoints.SelectedIndices.Count & " points to the new values?", _
            MsgBoxStyle.YesNo, "Multiple Point Change Confirmation") = MsgBoxResult.Yes) Then

                Try
                    Dim selectedItems As System.Windows.Forms.ListBox.SelectedIndexCollection = listPoints.SelectedIndices
                    Dim selectedIndices(selectedItems.Count - 1)
                    For i As Integer = 0 To selectedItems.Count - 1
                        selectedIndices(i) = selectedItems.Item(i)
                    Next

                    Dim itemToChange As Integer = 0
                    For i As Integer = 0 To selectedItems.Count - 1
                        itemToChange = selectedItems.Item(i)
                        Dim realIndexString As String = ""
                        Dim realIndex As Integer = 0
                        For c As Integer = 1 To 5
                            If (Mid(listPoints.Items.Item(itemToChange), c, 1) = ":") Then GoTo endOfMultNumber
                            realIndexString = realIndexString & Mid(listPoints.Items.Item(itemToChange), c, 1)
                        Next
endOfMultNumber:
                        realIndex = CInt(realIndexString)
                        If (Mid(stringx, 1, 1) = "x" And stringx.Length > 1) Then
                            If (Mid(stringx, 2, 1) = "*") Then
                                formMain.xval(realIndex) = formMain.xval(realIndex) * Mid(stringx, 3, stringx.Length - 1)
                            ElseIf (Mid(stringx, 2, 1) = "/") Then
                                formMain.xval(realIndex) = formMain.xval(realIndex) / Mid(stringx, 3, stringx.Length - 1)
                            Else
                                formMain.xval(realIndex) = formMain.xval(realIndex) + Mid(stringx, 2, stringx.Length - 1)
                            End If
                        ElseIf (Mid(stringx, 1, 1) = "x") Then
                            formMain.xval(realIndex) = formMain.xval(realIndex)
                        ElseIf (Mid(stringx, 1, 1) = "y" And stringx.Length > 1) Then
                            If (Mid(stringx, 2, 1) = "*") Then
                                formMain.xval(realIndex) = formMain.yval(realIndex) * Mid(stringx, 3, stringx.Length - 1)
                            ElseIf (Mid(stringx, 2, 1) = "/") Then
                                formMain.xval(realIndex) = formMain.yval(realIndex) / Mid(stringx, 3, stringx.Length - 1)
                            Else
                                formMain.xval(realIndex) = formMain.yval(realIndex) + Mid(stringx, 2, stringx.Length - 1)
                            End If
                        ElseIf (Mid(stringx, 1, 1) = "y") Then
                            formMain.xval(realIndex) = formMain.yval(realIndex)
                        ElseIf (Mid(stringx, 1, 1) = "z" And stringx.Length > 1) Then
                            If (Mid(stringx, 2, 1) = "*") Then
                                formMain.xval(realIndex) = formMain.zval(realIndex) * Mid(stringx, 3, stringx.Length - 1)
                            ElseIf (Mid(stringx, 2, 1) = "/") Then
                                formMain.xval(realIndex) = formMain.zval(realIndex) / Mid(stringx, 3, stringx.Length - 1)
                            Else
                                formMain.xval(realIndex) = formMain.zval(realIndex) + Mid(stringx, 2, stringx.Length - 1)
                            End If
                        ElseIf (Mid(stringx, 1, 1) = "z") Then
                            formMain.xval(realIndex) = formMain.zval(realIndex)
                        Else
                            formMain.xval(realIndex) = newx
                        End If

                        If (Mid(stringy, 1, 1) = "x" And stringy.Length > 1) Then
                            If (Mid(stringy, 2, 1) = "*") Then
                                formMain.yval(realIndex) = formMain.xval(realIndex) * Mid(stringy, 3, stringy.Length - 1)
                            ElseIf (Mid(stringy, 2, 1) = "/") Then
                                formMain.yval(realIndex) = formMain.xval(realIndex) / Mid(stringy, 3, stringy.Length - 1)
                            Else
                                formMain.yval(realIndex) = formMain.xval(realIndex) + Mid(stringy, 2, stringy.Length - 1)
                            End If
                        ElseIf (Mid(stringy, 1, 1) = "x") Then
                            formMain.yval(realIndex) = formMain.xval(realIndex)
                        ElseIf (Mid(stringy, 1, 1) = "y" And stringy.Length > 1) Then
                            If (Mid(stringy, 2, 1) = "*") Then
                                formMain.yval(realIndex) = formMain.yval(realIndex) * Mid(stringy, 3, stringy.Length - 1)
                            ElseIf (Mid(stringy, 2, 1) = "/") Then
                                formMain.yval(realIndex) = formMain.yval(realIndex) / Mid(stringy, 3, stringy.Length - 1)
                            Else
                                formMain.yval(realIndex) = formMain.yval(realIndex) + Mid(stringy, 2, stringy.Length - 1)
                            End If
                        ElseIf (Mid(stringy, 1, 1) = "y") Then
                            formMain.yval(realIndex) = formMain.yval(realIndex)
                        ElseIf (Mid(stringy, 1, 1) = "z" And stringy.Length > 1) Then
                            If (Mid(stringy, 2, 1) = "*") Then
                                formMain.yval(realIndex) = formMain.zval(realIndex) * Mid(stringy, 3, stringy.Length - 1)
                            ElseIf (Mid(stringy, 2, 1) = "/") Then
                                formMain.yval(realIndex) = formMain.zval(realIndex) / Mid(stringy, 3, stringy.Length - 1)
                            Else
                                formMain.yval(realIndex) = formMain.zval(realIndex) + Mid(stringy, 2, stringy.Length - 1)
                            End If
                        ElseIf (Mid(stringy, 1, 1) = "z") Then
                            formMain.yval(realIndex) = formMain.zval(realIndex)
                        Else
                            formMain.yval(realIndex) = newy
                        End If

                        If (Mid(stringz, 1, 1) = "x" And stringz.Length > 1) Then
                            If (Mid(stringz, 2, 1) = "*") Then
                                formMain.zval(realIndex) = formMain.xval(realIndex) * Mid(stringz, 3, stringz.Length - 1)
                            ElseIf (Mid(stringz, 2, 1) = "/") Then
                                formMain.zval(realIndex) = formMain.xval(realIndex) / Mid(stringz, 3, stringz.Length - 1)
                            Else
                                formMain.zval(realIndex) = formMain.xval(realIndex) + Mid(stringz, 2, stringz.Length - 1)
                            End If
                        ElseIf (Mid(stringz, 1, 1) = "x") Then
                            formMain.zval(realIndex) = formMain.xval(realIndex)
                        ElseIf (Mid(stringz, 1, 1) = "y" And stringz.Length > 1) Then
                            If (Mid(stringz, 2, 1) = "*") Then
                                formMain.zval(realIndex) = formMain.yval(realIndex) * Mid(stringz, 3, stringz.Length - 1)
                            ElseIf (Mid(stringz, 2, 1) = "/") Then
                                formMain.zval(realIndex) = formMain.yval(realIndex) / Mid(stringz, 3, stringz.Length - 1)
                            Else
                                formMain.zval(realIndex) = formMain.yval(realIndex) + Mid(stringz, 2, stringz.Length - 1)
                            End If
                        ElseIf (Mid(stringz, 1, 1) = "y") Then
                            formMain.zval(realIndex) = formMain.yval(realIndex)
                        ElseIf (Mid(stringz, 1, 1) = "z" And stringz.Length > 1) Then
                            If (Mid(stringz, 2, 1) = "*") Then
                                formMain.zval(realIndex) = formMain.zval(realIndex) * Mid(stringz, 3, stringz.Length - 1)
                            ElseIf (Mid(stringz, 2, 1) = "/") Then
                                formMain.zval(realIndex) = formMain.zval(realIndex) / Mid(stringz, 3, stringz.Length - 1)
                            Else
                                formMain.zval(realIndex) = formMain.zval(realIndex) + Mid(stringz, 2, stringz.Length - 1)
                            End If
                        ElseIf (Mid(stringz, 1, 1) = "z") Then
                            formMain.zval(realIndex) = formMain.zval(realIndex)
                        Else
                            formMain.zval(realIndex) = newz
                        End If
                    Next
                    recalculate()
                    'listPoints.SelectedIndices.Clear()
                    'listPoints.SelectedIndices.Add(selectedIndices(selectedIndices.Length - 1))
                Catch ex As Exception
                    MsgBox("One of the values is not a valid number or filter.")
                End Try
            End If
        Else
            MsgBox("You must select at least one point to change.")
        End If
    End Sub
    Private Sub btnFilter_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnFilter.Click
        recalculate()
    End Sub

    Private Sub recalculate()
        Try
            listPoints.Visible = False

            listPoints.Items.Clear()
            Dim newxval() As Single
            Dim newyval() As Single
            Dim newzval() As Single
            newxval = formMain.xval
            newyval = formMain.yval
            newzval = formMain.zval

            Dim highestPoint As Double = formMain.firstMeshVertex - 1
            If (formMain.cboxShowMeshPoints.Checked = True) Then
                highestPoint = formMain.pointCount - 1
            End If

            If (comboFilterFilter.SelectedIndex = 0) Then
                For i As Integer = 0 To highestPoint
                    listPoints.Items.Add(CStr(i) & ":  X:" & CStr(newxval(i)) & " Y:" & CStr(newyval(i)) & " Z:" & CStr(newzval(i)))
                Next
            Else
                If (comboFilterArgument.SelectedIndex = 0) Then
                    If (comboFilterFilter.SelectedIndex = 1) Then
                        For i As Integer = 0 To highestPoint
                            If (i = CDbl(txtFilterValue.Text)) Then
                                listPoints.Items.Add(CStr(i) & ":  X:" & CStr(newxval(i)) & " Y:" & CStr(newyval(i)) & " Z:" & CStr(newzval(i)))
                            End If
                        Next
                    ElseIf (comboFilterFilter.SelectedIndex = 2) Then
                        For i As Integer = 0 To highestPoint
                            If (i < CDbl(txtFilterValue.Text)) Then
                                listPoints.Items.Add(CStr(i) & ":  X:" & CStr(newxval(i)) & " Y:" & CStr(newyval(i)) & " Z:" & CStr(newzval(i)))
                            End If
                        Next
                    ElseIf (comboFilterFilter.SelectedIndex = 3) Then
                        For i As Integer = 0 To highestPoint
                            If (i > CDbl(txtFilterValue.Text)) Then
                                listPoints.Items.Add(CStr(i) & ":  X:" & CStr(newxval(i)) & " Y:" & CStr(newyval(i)) & " Z:" & CStr(newzval(i)))
                            End If
                        Next
                    ElseIf (comboFilterFilter.SelectedIndex = 4) Then
                        Dim lowestValue As Single = txtFilterValue.Text
                        Dim highestValue As Single = txtFilterValue2.Text
                        Dim tempValue As Single = 0
                        If (highestValue < lowestValue) Then
                            tempValue = lowestValue
                            lowestValue = highestValue
                            highestValue = tempValue
                        End If
                        For i As Integer = 0 To highestPoint
                            If (i >= lowestValue And i <= highestValue) Then
                                listPoints.Items.Add(CStr(i) & ":  X:" & CStr(newxval(i)) & " Y:" & CStr(newyval(i)) & " Z:" & CStr(newzval(i)))
                            End If
                        Next
                    ElseIf (comboFilterFilter.SelectedIndex >= 5 And comboFilterFilter.SelectedIndex <= 6) Then
                        Dim lowestValue As Double = 0
                        Dim highestValue As Double = formMain.pointCount - 1
                        If (comboFilterFilter.SelectedIndex = 5) Then highestValue = formMain.firstMeshVertex - 1
                        If (comboFilterFilter.SelectedIndex = 6) Then lowestValue = formMain.firstMeshVertex
                        For i As Integer = lowestValue To highestValue
                            listPoints.Items.Add(CStr(i) & ":  X:" & CStr(newxval(i)) & " Y:" & CStr(newyval(i)) & " Z:" & CStr(newzval(i)))
                        Next
                    End If
                ElseIf (comboFilterArgument.SelectedIndex >= 1 And comboFilterArgument.SelectedIndex <= 4) Then
                    Dim coordVal(0) As Single
                    If (comboFilterArgument.SelectedIndex = 1) Then coordVal = formMain.xval
                    If (comboFilterArgument.SelectedIndex = 2) Then coordVal = formMain.yval
                    If (comboFilterArgument.SelectedIndex = 3) Then coordVal = formMain.zval

                    If (comboFilterFilter.SelectedIndex = 1) Then
                        For i As Integer = 0 To highestPoint
                            If (coordVal(i) = CDbl(txtFilterValue.Text)) Then
                                listPoints.Items.Add(CStr(i) & ":  X:" & CStr(newxval(i)) & " Y:" & CStr(newyval(i)) & " Z:" & CStr(newzval(i)))
                            End If
                        Next
                    ElseIf (comboFilterFilter.SelectedIndex = 2) Then
                        For i As Integer = 0 To highestPoint
                            If (coordVal(i) < CDbl(txtFilterValue.Text)) Then
                                listPoints.Items.Add(CStr(i) & ":  X:" & CStr(newxval(i)) & " Y:" & CStr(newyval(i)) & " Z:" & CStr(newzval(i)))
                            End If
                        Next
                    ElseIf (comboFilterFilter.SelectedIndex = 3) Then
                        For i As Integer = 0 To highestPoint
                            If (coordVal(i) > CDbl(txtFilterValue.Text)) Then
                                listPoints.Items.Add(CStr(i) & ":  X:" & CStr(newxval(i)) & " Y:" & CStr(newyval(i)) & " Z:" & CStr(newzval(i)))
                            End If
                        Next
                    ElseIf (comboFilterFilter.SelectedIndex = 4) Then
                        Dim lowestValue As Single = txtFilterValue.Text
                        Dim highestValue As Single = txtFilterValue2.Text
                        Dim tempValue As Single = 0
                        If (highestValue < lowestValue) Then
                            tempValue = lowestValue
                            lowestValue = highestValue
                            highestValue = tempValue
                        End If
                        For i As Integer = 0 To highestPoint
                            If (coordVal(i) >= lowestValue And coordVal(i) <= highestValue) Then
                                listPoints.Items.Add(CStr(i) & ":  X:" & CStr(newxval(i)) & " Y:" & CStr(newyval(i)) & " Z:" & CStr(newzval(i)))
                            End If
                        Next
                    End If
                End If
            End If
        Catch ex As Exception
            MsgBox("Cannot evaluate current filter. Check to make sure that the filter value is a valid number.", _
            MsgBoxStyle.Critical, "Error Evaluating Filter")
        End Try

        listPoints.Visible = True
    End Sub

    Private Sub txtPointX_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles txtPointX.TextChanged
        If (formMain.cboxUseColorCoding.Checked = False) Then
            txtPointX.BackColor = Color.FromKnownColor(KnownColor.White)
            Exit Sub
        End If
        Dim stringx As String = txtPointX.Text.ToLower
        If (Mid(stringx, 1, 1) = "x" Or Mid(stringx, 1, 1) = "y" Or Mid(stringx, 1, 1) = "z") Then
            Try
                If (stringx.Length <> 1) Then Dim temp As Single = CSng(Mid(stringx, 2, stringx.Length - 1))
                txtPointX.BackColor = Color.Lime
            Catch ex As Exception
                txtPointX.BackColor = Color.Red
            End Try
            If (Mid(stringx, 2, 1) = "*" Or Mid(stringx, 2, 1) = "/") Then
                Try
                    Dim temp As Single = CSng(Mid(stringx, 3, stringx.Length - 2))
                    txtPointX.BackColor = Color.Lime
                Catch ex As Exception
                    txtPointX.BackColor = Color.Red
                End Try
            End If
        Else
            Try
                If (stringx <> "") Then Dim temp As Single = CSng(stringx)
                If (stringx <> "") Then
                    txtPointX.BackColor = Color.Lime
                Else
                    txtPointX.BackColor = Color.FromKnownColor(KnownColor.Window)
                End If
                If (Mid(stringx, 1, 2) = "&h") Then txtPointX.BackColor = Color.Yellow
            Catch ex As Exception
                txtPointX.BackColor = Color.Red
            End Try
        End If
    End Sub
    Private Sub txtPointY_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles txtPointY.TextChanged
        If (formMain.cboxUseColorCoding.Checked = False) Then
            txtPointY.BackColor = Color.FromKnownColor(KnownColor.White)
            Exit Sub
        End If
        Dim stringy As String = txtPointY.Text.ToLower
        If (Mid(stringy, 1, 1) = "x" Or Mid(stringy, 1, 1) = "y" Or Mid(stringy, 1, 1) = "z") Then
            Try
                If (stringy.Length <> 1) Then Dim temp As Single = CSng(Mid(stringy, 2, stringy.Length - 1))
                txtPointY.BackColor = Color.Lime
            Catch ex As Exception
                txtPointY.BackColor = Color.Red
            End Try
            If (Mid(stringy, 2, 1) = "*" Or Mid(stringy, 2, 1) = "/") Then
                Try
                    Dim temp As Single = CSng(Mid(stringy, 3, stringy.Length - 2))
                    txtPointY.BackColor = Color.Lime
                Catch ex As Exception
                    txtPointY.BackColor = Color.Red
                End Try
            End If
        Else
            Try
                If (stringy <> "") Then Dim temp As Single = CSng(stringy)
                If (stringy <> "") Then
                    txtPointY.BackColor = Color.Lime
                Else
                    txtPointY.BackColor = Color.FromKnownColor(KnownColor.Window)
                End If
                If (Mid(stringy, 1, 2) = "&h") Then txtPointY.BackColor = Color.Yellow
            Catch ex As Exception
                txtPointY.BackColor = Color.Red
            End Try
        End If
    End Sub
    Private Sub txtPointZ_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles txtPointZ.TextChanged
        If (formMain.cboxUseColorCoding.Checked = False) Then
            txtPointZ.BackColor = Color.FromKnownColor(KnownColor.White)
            Exit Sub
        End If
        Dim stringz As String = txtPointZ.Text.ToLower
        If (Mid(stringz, 1, 1) = "x" Or Mid(stringz, 1, 1) = "y" Or Mid(stringz, 1, 1) = "z") Then
            Try
                If (stringz.Length <> 1) Then Dim temp As Single = CSng(Mid(stringz, 2, stringz.Length - 1))
                txtPointZ.BackColor = Color.Lime
            Catch ex As Exception
                txtPointZ.BackColor = Color.Red
            End Try
            If (Mid(stringz, 2, 1) = "*" Or Mid(stringz, 2, 1) = "/") Then
                Try
                    Dim temp As Single = CSng(Mid(stringz, 3, stringz.Length - 2))
                    txtPointZ.BackColor = Color.Lime
                Catch ex As Exception
                    txtPointZ.BackColor = Color.Red
                End Try
            End If
        Else
            Try
                If (stringz <> "") Then Dim temp As Single = CSng(stringz)
                If (stringz <> "") Then
                    txtPointZ.BackColor = Color.Lime
                Else
                    txtPointZ.BackColor = Color.FromKnownColor(KnownColor.Window)
                End If
                If (Mid(stringz, 1, 2) = "&h") Then txtPointZ.BackColor = Color.Yellow
            Catch ex As Exception
                txtPointZ.BackColor = Color.Red
            End Try
        End If
    End Sub
End Class