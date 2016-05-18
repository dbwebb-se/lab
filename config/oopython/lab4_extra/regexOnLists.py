#!/usr/bin/env python3
# -*- coding: utf-8
"""
Contains a function for running regex on two lists.
"""
import re

def regexOnLists(patter, shouldMatch, shouldntMatch, index=0):
    """
    Function for using regex search function on a list that contains string that should match
    and a list with string that shouldnt match.
    param patter: Regex pattern that is used on the lists.
    param shouldMatch: List containing strings that pattern should match.
    param shouldntMatch: List containing strings that pattern shouldnt match.
    param index: Index for which group should be used for result. Is set to 0 as default.
    """
    should = []
    shouldnt = []
    for word in shouldMatch:
        should.append(re.search(patter, word).group(index))
    for word in shouldntMatch:
        result = re.search(patter, word)
        if result:
            shouldnt.append(result.group(index))

    if shouldnt:
        should.append(shouldnt)
    return should
